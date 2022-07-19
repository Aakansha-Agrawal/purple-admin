<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'renter_id' => '3',
            'service_provider_id' => '8',
            'equipment_name' => $this->faker->name,
            'package_taken' => $this->faker->name,
            'quantity' => 100,
            'delivery_type' => $this->faker->name,
            'expiry_date' => $this->faker->date,
            'purchase_date' => $this->faker->date,
            'return_date' => $this->faker->date,
            'price_type' => $this->faker->text,
            'total_price' => 100,
        ];
    }
}
