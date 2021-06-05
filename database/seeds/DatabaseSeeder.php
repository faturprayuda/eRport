<?php

use App\Pelajaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $class = array(
        //     SiswaSeeder::class,
        //     PelajaranSeeder::class
        // );
        // $countClass = count($class);
        // for ($i = 0; $i < $countClass; $i++) {
        //     $this->call($class[$i]);
        // }

        $this->call(SiswaSeeder::class);
    }
}
