<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    protected $faker;
    /**
     * ProdutoSeeder constructor.
     * @param $faker
     */
    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 0; $x < 10; $x++) {
            \estudo\Entities\Categoria::create([
                'nomeCategoria' => $this->faker->name
            ]);
        }
    }
}
