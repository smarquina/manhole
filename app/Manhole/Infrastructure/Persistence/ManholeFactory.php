<?php


namespace Manhole\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Factories\Factory;
use Manhole\Domain\Models\Material;


class ManholeFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EloquentManhole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'guid'       => $this->faker->uuid,
            'radio'      => $this->faker->numberBetween(config('parameters.manhole.size.min_value'), 30),
            'material'   => $this->faker->randomElement(Material::getValues()),
            'decoration' => $this->faker->boolean(),
        ];
    }
}
