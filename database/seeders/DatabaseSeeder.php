<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Complaint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Pak RT Baik',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Kartono',
            'email' => 'user@mail.com',
            'role' => 'user',
            'password' => Hash::make('12341234'),
        ]);

        Artikel::factory(10)->create();
        Complaint::factory(10)->create();
    }
}
