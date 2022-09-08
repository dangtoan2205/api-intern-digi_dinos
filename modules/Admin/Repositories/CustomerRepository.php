<?php

namespace Modules\Admin\Repositories;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Repositories\BaseRepository;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Admin\Models\Customer;
use Modules\Admin\Requests\CustomerRequest;

class CustomerRepository extends BaseRepository
{
    /**
     * @return  Customer
     */
    public function getModel()
    {
        return Customer::class;
    }

    /**
     * Create a new resource in storage.
     *
     * @param CustomerRequest $request CustomerRequest.
     *
     * @return Query
     */
    public function createCustomer(CustomerRequest $request)
    {
        try {
            $customer = [
                'title_vi' => $request->title_vi,
                'title_en' => $request->title_en,
                'title_ja' => $request->title_ja,
                'is_active' => $request->is_active ?? 0,
            ];
            $getImage = $request->file('image');
            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('upload/customer', $newNameImage);
            } else {
                $newNameImage = '';
            }
            $customer['image'] = $newNameImage;
            return $customer = $this->model->create($customer);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param integer         $id      ID.
     * @param CustomerRequest $request CustomerRequest.
     *
     * @return Query
     */
    public function updateCustomer(int $id, CustomerRequest $request)
    {
        try {
            $customer = $this->model->find($id);
            $dataUpdate = [
                'title_vi' => $request->title_vi,
                'title_en' => $request->title_en,
                'title_ja' => $request->title_ja,
                'is_active' => $request->is_active,
            ];
            $newNameImage = $customer->image;
            $getImage = $request->file('image');
            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('upload/customer', $newNameImage);
                $fileImage = "upload/customer/" .  $customer->image;
                File::delete($fileImage);
            }
            $dataUpdate['image'] = $newNameImage;
            $customer->update($dataUpdate);
            return $customer;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param integer $id ID.
     *
     * @return boolean
     */
    public function deleteCustomer(int $id)
    {
        try {
            $customer = $this->model->find($id);
            $customer->delete();
            $fileImage = "upload/customer/" .  $customer->image;
            File::delete($fileImage);
            return true;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param integer $id ID.
     *
     * @return Query
     */
    public function findCustomer(int $id)
    {
        try {
            $customer = $this->model->find($id);
            return $customer;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param mixed $query  Query.
     * @param mixed $column Column.
     * @param mixed $data   Data.
     *
     * @return Query
     */
    public function search($query, $column, $data)
    {
        switch ($column) {
            case 'id':
            case 'created_at':
                return $query->whereDate($column, $data);
            case 'title_vi':
            case 'title_en':
            case 'title_ja':
                return $query->where($column, 'like', '%' . $data . '%');
            default:
                return $query;
        }
    }
}
