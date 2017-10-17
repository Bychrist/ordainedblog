<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
       		'name'=>'Bychrist',
       		'email'=>'ordained@yahoo.com',
       		'password'=>bcrypt('humble3205'),
          'admin'=>1
       		]);

        Profile::create([
          'user_id' => $user->id,
          'avatar' => 'some links to image',
          'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
          'facebook' => 'facebook.com',
          'youtube'=>'youtube.com'

          ]);

    }
}
