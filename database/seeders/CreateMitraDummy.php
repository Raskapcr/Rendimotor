<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class createMitraDummy extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 159) as $index) {
            DB::table('mitra')->insert([
                'nama_mitra' => $faker->name,
                'alamat' => $faker->address,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('###########'),
                'jenis_kemitraan' => $faker->randomElement(['Silver', 'Gold', 'Platinum']),
                'tgl_bergabung' => $faker->date('Y-m-d', now()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
