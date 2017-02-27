<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        \gotham\Group::create([
            'name' => 'Administrators',
            'slug' => 'administrators'
        ]);

        \gotham\Group::create([
            'name' => 'Users',
            'slug' => 'users'
        ]);

        \gotham\Group::create([
            'name' => 'Guests',
            'slug' => 'guests'
        ]);


    }
}
