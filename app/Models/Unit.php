<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nama_unit'];



    public function item()
    {
        return $this->hasMany(Item::class,'unit_id');
    }
    
}
