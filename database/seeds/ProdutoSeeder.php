<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
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
        $categoria = \estudo\Entities\Categoria::all();

        for($x = 0; $x < 20; $x++){
            \estudo\Entities\Produto::create([
                'nomeProduto'           => $this->faker->name,
                'idCategoria'           => $categoria[rand(0, (count($categoria)-1))]->id,
                'fotoProduto'           => $this->faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
                'precoProduto'          => $this->faker->randomFloat(2, 0, 100),
                'estoqueProduto'        => $this->faker->numberBetween(0, 100),
                'destaqueProduto'       => $this->faker->randomElement([1, 0])
            ]);
        }
    }
}
