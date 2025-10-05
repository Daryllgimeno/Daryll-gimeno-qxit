<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       // QXIT admin user
       //use php artisan migrate:fresh --seed for seeding 
            User::create([
            'email' => 'qxit@quantumx.com',
            'password' => Hash::make('interview@qxit'),
        ]);
    }
}
