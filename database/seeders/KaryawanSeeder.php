<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        Karyawan::factory()->count(30)->create();
    }
}

