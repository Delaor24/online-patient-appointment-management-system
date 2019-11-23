<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

       // Factory(App\Specialist::class,10)->create();
        //Factory(App\Staff::class,10)->create();

        DB::table('admins')->insert([
            'name' =>'Habibur Rahman Shuvo',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin1234'),
            'type' =>'admin'
        ]);

    }
}
