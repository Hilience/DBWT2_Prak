<?php
namespace Database\Factories;

use App\Models\AbUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbUserFactory extends Factory
{
    protected $model = AbUser::class;

    public function definition(): array
    {
        return [
            'ab_name' => $this->faker->userName(),
            'ab_password' => 'password',
            'ab_mail' => $this->faker->unique()->safeEmail(),
        ];
    }
}
