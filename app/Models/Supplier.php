<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nama_supplier','type','address','email','phone','desc'];


    
    public function Stock_in()
    {
        return $this->hasOne(Stock::class,'supplier_id');
    }
}
