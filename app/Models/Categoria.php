<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;
    
    public function products() {
        return $this->hasMany(Product::class, 'id_categoria', 'id');
    }
    
}