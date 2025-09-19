<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;


class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
       
        $user = User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

         WeightTarget::create([
        'user_id' => $user->id,
        'target_weight' => 50.0,
        ]);

        WeightLog::factory()->count(35)->create(['user_id' => $user->id]);



    }
}
