<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // factory(App\Banner::class, 30)->create();

      App\Admin::create([
        'name'     => 'Admin',
        'email'    => 'admin@opinionus.com',
        'password' => bcrypt('123456')
      ]);

      App\User::create([
        'name'     => 'John Doe',
        'email'    => 'johndoe@opinionus.com',
        'password' => bcrypt('123456')
      ]);

      App\User::create([
        'name'     => 'Jane Doe',
        'email'    => 'janedoe@opinionus.com',
        'password' => bcrypt('123456')
      ]);

      DB::unprepared( file_get_contents( storage_path('app/opinion.sql') ) );
    }
}
