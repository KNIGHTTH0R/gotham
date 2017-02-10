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
            'first_name' => $util->firstlettertoupper('bruce'),
            'last_name' => $util->firstlettertoupper('wayne'),
            'permission_level' => $util->firstlettertoupper('administrator'),
            'account_status' => 'Enabled',
            'email' => 'brucewayne@gotham.local',
            'password' => bcrypt('Gotham1')
        ]);
        
        // \gotham\User::create([
        //     'first_name' => $util->firstlettertoupper('bobby'),
        //     'last_name' => $util->firstlettertoupper('johnson'),
        //     'permission_level' => $util->firstlettertoupper('administrator'),
        //     'account_status' => 'Enabled',
        //     'email' => 'bobby@gotham.local',
        //     'password' => bcrypt('Gotham1')
        // ]);

        for ($x = 0; $x < 0; $x++) {
            factory(gotham\User::class, 1)->create();
        }
    }
}
