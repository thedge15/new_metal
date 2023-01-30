<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = false;
    protected $table = 'products';

    public function sizes()
    {
        return $this->hasMany(Size::class, 'product_id', 'id');
    }
}
