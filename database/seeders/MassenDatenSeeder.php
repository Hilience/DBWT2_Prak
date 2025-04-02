<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MassenDatenSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10000; $i++)
        {
            DB::table('ab_user')->insert([
                'ab_name' => Str::random(20),
                'ab_password' => Hash::make('password'),
                'ab_mail' => Str::random(20).'@example.com',
            ]);
        }
    }
}
