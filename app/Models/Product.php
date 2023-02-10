<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'products';

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function cart()
    {
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id');
    }
    public function rent(){
        return $this->belongsToMany(User::class, 'rents');
    }

}
