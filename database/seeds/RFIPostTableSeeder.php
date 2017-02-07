<?php

use Illuminate\Database\Seeder;

class RFIPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($x = 0; $x < 100; $x++) {
            factory(gotham\RFIPost::class, 1)->create();
        }
    }
}
