<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AbUser;

class MassenDatenSeeder extends Seeder
{
    public function run()
    {
        AbUser::factory()->count(10000)->create();
    }
}
