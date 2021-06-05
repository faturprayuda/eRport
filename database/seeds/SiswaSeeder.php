<?php

use App\Siswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            Siswa::create([
                'nis' => $faker->numberBetween($min = 100000, $max = 999999),
                'nama' => $faker->name,
                'kelas' => $faker->numberBetween($min = 1, $max = 3) . $faker->randomElement($array = array('a', 'b', 'c'))
            ]);
        }
    }
}
