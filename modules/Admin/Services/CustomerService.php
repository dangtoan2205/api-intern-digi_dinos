<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use DB;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Modules\Admin\Models\Customer;
use Modules\Admin\Repositories\CustomerRepository;

class CustomerService extends BaseService
{

    /**
     * Construct
     *
     * @param CustomerRepository $repository CustomerRepository.
     *
     * @return void
     */
    public function __construct(
        CustomerRepository $repository
    )
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     * GetRepository
     *
     * @return object
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return Customer
     */
    public function getModel()
    {
        return Customer::class;
    }

    /**
     * Create Customer.
     *
     * @param mixed $request Request.
     *
     * @return Customer
     */
    public function createCustomer($request)
    {
        try {
            return $this->repository->createCustomer($request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update resource in storage.
     *
     * @param mixed $id      ID.
     * @param mixed $request Request.
     *
     * @return Customer $customer
     */
    public function updateCustomer($id, $request)
    {
        try {
            return $this->repository->updateCustomer($id, $request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Delete resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return Customer $customer
     */
    public function deleteCustomer($id)
    {
        try {
            return $this->repository->deleteCustomer($id);
        } catch (DDException $th) {
            LogHelper::logTrace($th);
            throw $th;
        }
    }

    /**
     * Find resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return Customer $customer
     */
    public function findCustomer($id)
    {
        try {
            return $this->repository->findCustomer($id);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}
