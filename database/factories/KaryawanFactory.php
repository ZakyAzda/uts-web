<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_karyawan' => $this->faker->name,
            'bidang_keahlian' => $this->faker->randomElement(['Web Developer', 'Graphic Designer', 'Content Writer', 'SEO Specialist']),
            'email' => $this->faker->unique()->safeEmail,
            'nomor_telepon' => $this->faker->phoneNumber,
            'tanggal_mulai' => $this->faker->date(),
            'durasi_kontrak' => $this->faker->numberBetween(1, 12),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif', 'selesai']),
        ];
    }
}

