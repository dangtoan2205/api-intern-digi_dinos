<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Menu extends Model
{
    use HasRoles;

    protected $guard_name = 'admin';

    protected $fillable = [
        'title',
        'link',
        'icon',
        'parent_id',
        'position',
    ];

    /**
     * Menus
     *
     * @return mixed
     */
    public function menus()
    {
        return $this->hasMany(self::class, 'parent_id')->with('menus')->orderBy('position', 'asc');
    }

    /**
     * Parents
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->with('parent')->orderBy('position', 'asc');
    }

    /**
     * @param mixed $menus Menu.
     * @param mixed $roles Roles.
     *
     * @return mixed
     */
    public function syncRolesDeep($menus, $roles)
    {
        foreach ($menus as $menu) {
            $menu->syncRoles($roles);
            $this->syncRolesDeep($menu->menus, $roles);
        }
    }

    /**
     * Get increment position.
     *
     * @return mixed
     */
    public function getIncrementPosition()
    {
        $lastPosition = $this->max('position') ?? 0;

        return $lastPosition + 1;
    }

    /**
     * Get childs menu.
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
