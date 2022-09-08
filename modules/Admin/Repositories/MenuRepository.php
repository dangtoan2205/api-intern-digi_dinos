<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Modules\Admin\Models\Menu;
use App\Components\Recusive;
use Modules\Admin\Requests\MenuRequest;

class MenuRepository extends BaseRepository
{
    /**
     * @return  Menu
     */
    public function getModel()
    {
        return Menu::class;
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
            case 'title':
                return $query->where($column, 'like', '%' . $data . '%');
            default:
                return $query;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Query
     */
    public function getMenuByParentId()
    {
        try {
            $data = $this->model->where('parent_id', 0)->get();
            return $data;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param mixed $request Request.
     *
     * @return Query
     */
    public function createMenu($request)
    {
        $position = $this->model->max('position');
        try {
            $dataInsert = [
                'title' => $request->title,
                'link' => $request->link,
                'icon' => $request->icon,
                'parent_id' => $request->parent_id,
                'position' => ++$position,
            ];

            return $menu = $this->model->create($dataInsert);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return Query
     */
    public function findMenu($id)
    {
        try {
            $menu = $this->model->find($id);
            return $menu;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param mixed $id      ID.
     * @param mixed $request Request.
     *
     * @return Query
     */
    public function updateMenu($id, $request)
    {
        try {
            $menu = $this->model->find($id);
            $dataUpdate = [
                'title' => $request->title,
                'link' => $request->link,
                'icon' => $request->icon,
                'parent_id' => $request->parent_id,
            ];

            $menu->update($dataUpdate);
            return $menu;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param mixed $request Request.
     *
     * @return Query
     */
    public function updatePosition($request)
    {
        try {
            $i = 1;
            foreach ($request->all() as $value) {
                $menu = $this->model->where('id', $value['id'])->first();
                $menu->position = $i;
                $menu->save();
                $i++;
            }
            return $menu;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return boolean
     */
    public function destroyMenu($id)
    {
        try {
            $menu = $this->model->find($id);
            $menu->delete();
            return true;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}
