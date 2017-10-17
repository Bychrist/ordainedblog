<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Setting::create([
        		'site_name'=>'Blog Name',
        		'site_logo'=>'uploads/images/sitelogo.jpg',
        		'contact'=>'All contacts here',
        		'copyright'=>'Your copy right details dd/mm/yyyy'
        	]);
    }
}
