<?php

use Illuminate\Database\Seeder;

class CapitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Capital::class, 10)->create();
    }
}
