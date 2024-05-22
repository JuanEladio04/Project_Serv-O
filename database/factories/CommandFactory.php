<?php

namespace Database\Factories;

use App\Models\Command;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandFactory extends Factory
{
    protected $model = Command::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'command' => $this->faker->sentence,
            'operation' => $this->faker->randomElement(['install', 'uninstall', 'operation']),
            'service_id' => Service::factory(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
