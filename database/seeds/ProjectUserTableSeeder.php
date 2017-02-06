<?php

use Illuminate\Database\Seeder;

class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($x = 0; $x < 3; $x++) {
            factory(gotham\Project_User::class, 1)->create();
        }
    }
}
