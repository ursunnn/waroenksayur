<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'rents';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function music(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
