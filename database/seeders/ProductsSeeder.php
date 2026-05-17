<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(100)->recycle(Categoria::all())->create();
    }
}
