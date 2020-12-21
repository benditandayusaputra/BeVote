<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = 'Administrator';
        $admin->username = 'admin';
        $admin->password = bcrypt('admin123');
        $admin->save();
    }
}
