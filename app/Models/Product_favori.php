<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_favori extends Model
{
    use HasFactory;
    protected $guarded = [];
    function prduct(){
        return $this->belongsTo(Product::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
