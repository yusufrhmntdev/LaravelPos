<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nama_customer','phone','address'];
    protected $dates = ['deleted_at'];

    public function sale()
    {
        return $this->hasMany(Sale::class,'customer_id');
    }
}
