<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    //
    protected $fillable = ['item_id','type','detail','supplier_id','qty','user_id'];

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }
    public function supplier() 
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function user() 
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
