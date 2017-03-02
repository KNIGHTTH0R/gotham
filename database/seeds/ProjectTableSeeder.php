<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
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
            $project = factory(gotham\Project::class, 1)->create();
            $projectGroup = gotham\Group::where('name', 'Administrators')->first();
            $groupUsers = $projectGroup->users;
            foreach ($groupUsers as $user){
                $project->users()->save($user);
            }
            $project->groups()->save($projectGroup);
        }


    }
}
