<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoppingcart extends Model
{
    use HasFactory;
    protected $guarded = [];


    //every cart items belongs to a product
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
