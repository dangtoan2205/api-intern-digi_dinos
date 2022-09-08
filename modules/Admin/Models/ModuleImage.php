<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'name_vi',
        'name_en',
        'name_ja',
        'status',
        'image_url',
    ];

    /**
     * Module
     *
     * @return mixed
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
