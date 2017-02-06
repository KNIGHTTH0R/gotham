<?php

use Illuminate\Database\Seeder;

class RFITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($x = 0; $x < 10; $x++) {
            factory(gotham\RFI::class, 1)->create();
        }
    }
}
