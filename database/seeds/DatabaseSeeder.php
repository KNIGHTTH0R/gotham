<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UserTableSeeder::class);
      $this->call(ProjectTableSeeder::class);
      $this->call(RFITableSeeder::class);
      $this->call(ProjectUserTableSeeder::class);
      $this->call(RFIPostTableSeeder::class);
    }
}
