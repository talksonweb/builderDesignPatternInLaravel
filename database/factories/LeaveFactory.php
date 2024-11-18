<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leave>
 */
class LeaveFactory extends Factory
{
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'days_on_leave' => rand(2,8),
            'approved_by' => User::factory()->create()->id,
            'approved_on' => now()->subDays(rand(2,5)),
            'reason_for_leave' => fake()->paragraph(),
        ];
    }
}
