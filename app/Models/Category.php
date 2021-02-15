<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nama_category'];

    public function item()
    {
        return $this->hasMany(Item::class,'category_id');
    }
}
