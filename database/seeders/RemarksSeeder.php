<?php

namespace Database\Seeders;

use App\Models\Remarks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Remarks::factory(20)->create();
    }
}
