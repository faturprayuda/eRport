<?php

use App\Pelajaran;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $pelajaran = array('Bahasa Indonesia', 'Matematika', 'Ilmu Pengetahuan Alam', 'Ilmu Pengetahuan Sosial', 'Sejarah');
        $countPelajaran = count($pelajaran);
        for ($i = 0; $i < $countPelajaran; $i++) {
            Pelajaran::create([
                'nama_pelajaran' => $pelajaran[$i],
                'kkm' => $faker->numberBetween($min = 75, $max = 90)
            ]);
        }
    }
}
