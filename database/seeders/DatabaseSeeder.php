<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
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
     

    Role::factory(1)->create(['role_name' => 'admin'])->each(function ($role) {
            //create 1 user for each role

         User::factory(1)->create(['name' =>'anouar1', 'email' => 'anouar1@gmail.com','role_id'=>$role->id, 'password' => bcrypt('anouar11')]);});



    Role::factory(1)->create(['role_name' => 'SuperAdmin'])->each(function ($role) {
            //create 1 user for each role

         User::factory(1)->create(['name' =>'anouar', 'email' => 'anouar@gmail.com','role_id'=>$role->id, 'password' => bcrypt('anouar10')]);});       

          
     Role::factory(1)->create(['role_name' => 'user'])->each(function ($role) {
                //create 3 user for each role
             User::factory(3)->create(['role_id'=>$role->id, 'password' => bcrypt('anouar10')])->each(function ($user){
                //create 3 posts for each user
                Post::factory(3)->create(['user_id' => $user->id]);

             });
            });



}
}
        
        
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
