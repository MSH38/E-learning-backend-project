<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=\App\Models\User::create(
            [
                'name'=>'super admin',
                'email'=>'super@2admins.com',
                'password'=>bcrypt('12345'),
                'username'=>'80020197',
                'phone'=>'01148077556'
            ]
        );
$user->attachRole('super_admin');
        //
    }
}
