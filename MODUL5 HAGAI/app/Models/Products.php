<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $guarded = [];


    public function hasManyOrder()
    {
        return $this->hasMany('App\Models\Orders', 'product_id');
    }
}
