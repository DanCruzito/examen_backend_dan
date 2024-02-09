<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Libro;
use App\Models\Prestamos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamosFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Prestamos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libro_id' => Libro::all()->random()->id,
            'cliente_id' => Cliente::all()->random()->id,
            'fecha_prestamo' => $this->faker->dateTimeBetween('-3 years', '-1 week'),
            'dias_prestamo' => $this->faker->numberBetween(1, 30),
            'estado' => $this->faker->randomElement(['En Prestamo', 'Devuelto']),
        ];
    }
}
