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
            'permission_level' => $util->firstlettertoupper('administrators'),
            'account_status' => 'Enabled',
            'email' => 'brucewayne@gotham.local',
            'password' => bcrypt('Gotham1')
        ]);

        $bruce = \gotham\User::find(1);
        $adminGroup = \gotham\Group::where('name', 'Administrators')->first();
        $bruce->groups()->save($adminGroup);
        
        foreach(\gotham\RFI::get() as $rfi){
            $bruce->rfis()->save($rfi);
        }

        \gotham\User::create([
            'first_name' => $util->firstlettertoupper('robin'),
            'last_name' => $util->firstlettertoupper('johnson'),
            'permission_level' => $util->firstlettertoupper('administrators'),
            'account_status' => 'Enabled',
            'email' => 'robinjohnson@gotham.local',
            'password' => bcrypt('Gotham1')
        ]);

        $bobby = \gotham\User::find(2);
        $bobby->groups()->save($adminGroup);
        
        

        for ($x = 1; $x <= 0; $x++) {
            $one = 1;
            
            $user = factory(gotham\User::class, 1)->create();
            $userGroup = \gotham\Group::where('name', 'Guests')->first();
            $user->groups()->save($userGroup);
            
            $this->command->info("Created " . number_format($x * $one) ." of " . number_format(1000) . " User records.");
        }
    }
}
