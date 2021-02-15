<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    //
    use SoftDeletes;
    use AutoNumberTrait;
    protected $fillable = ['barcode','nama_item','category_id','unit_id','price','stock','image'];



    public function getAutoNumberOptions()
    {
    return [
        'barcode' => [
            'format' => function () {
                return 'QR.' . date('Y.m.d') . '.?'; 
             },
            'length' => 5,
         ]
     ];
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
    public function Stock_in()
    {
        return $this->hasMany(Stock::class,'item_id');
    }
    public function sale_detail()
    {
        return $this->hasMany(sale_detail::class,'item_id');
    }
   
    // public function sale_detail()
    // {
    //     return $this->belongsTo(Sale_detail::class,'item_id','id');
   
    // public function cart()
    // {
    //     return $this->hasMany(Item::class,'unit_id');
    // }
    
   
   






}
