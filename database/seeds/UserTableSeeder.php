<?php

use Illuminate\Database\Seeder;
use gotham\Http\Controllers\MyUtilController;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $util = new MyUtilController();

        \gotham\User::create([
            'first_name' => $util->firstlettertoupper('james'),
            'last_name' => $util->firstlettertoupper('muldrow'),
            'email' => 'jamesmuldrow@gmail.com',
            'password' => bcrypt('Marines1')
        ]);

        for ($x = 0; $x < 5000; $x++) {
            factory(gotham\User::class, 1)->create();
        }
    }
}
