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
        for ($x = 1; $x <= 100; $x++) {
            
            $one = 1;
            
            factory(gotham\RFI::class, $one)->create();
            $this->command->info("Created " . number_format($x * $one) ." of " . number_format(100*$one) . " records.");
        }
    }
}
