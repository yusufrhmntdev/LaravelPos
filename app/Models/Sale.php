<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = ['invoice','customer_id','total_price','discount','final_price','cash','remaining','note','user_id'];

    

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function sale_detail()
    {
        return $this->hasMany('\App\Models\Sale_detail','sale_id');
    }
    
    // public function sale_detail()
    // {
    //     return $this->belongsTo(Sale_detail::class,'sale_id','id');
    // }
    // public function item()
    // {
    //     return $this->belongsTo(Item::class,'item_id','id');
    // }
}
