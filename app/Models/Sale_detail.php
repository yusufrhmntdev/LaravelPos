<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale_detail extends Model
{
    //

    protected $fillable = ['sale_id','item_id','price','qty','discount_item','total'];


    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }
}
