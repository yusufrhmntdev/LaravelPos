<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
 
    
    protected $fillable = ['item_id','price','qty','discount','total','user_id'];

    public function Item()
    {
    	return $this->belongsTo(Item::class,'item_id','id');
    }
    public function User()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }

}
