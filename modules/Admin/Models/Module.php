<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_vi',
        'name_en',
        'name_ja',
    ];

    /**
     * Images
     *
     * @return mixed
    */
    public function images()
    {
        return $this->hasMany(ModuleImage::class);
    }
}
