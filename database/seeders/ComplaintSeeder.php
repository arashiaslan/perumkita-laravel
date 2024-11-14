<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::factory(10)->create();
    }
}
