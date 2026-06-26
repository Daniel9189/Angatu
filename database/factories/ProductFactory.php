<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Categoria;
use Database\Seeders\CategoriasSeeder;

/**
 * @extends Factory<Product>
 */

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->sentence;
        return [
            'nome' => $nome,
            'descricao' => $this->faker->paragraph,
            'preco' => $this->faker->randomNumber(2),
            'slug' => Str::slug($nome),
            'imagem' => 'https://loremflickr.com/400/400/product?random=' . $this->faker->unique()->randomNumber(),
            'id_user' => User::factory(),
            'id_categoria' => Categoria::factory(),
        ];
    }
}
