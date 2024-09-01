<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Luis Fax',
        	'phone' => '3511159550',
        	'email' => 'luisfaax@gmail.com',
        	'profile' => 'ADMIN',
        	'status' => 'ACTIVE',
        	'password' => bcrypt('123')
        ])->assignRole('Admin');
        User::create([
        	'name' => 'Melisa Albahat',
        	'phone' => '3549873214',
        	'email' => 'melisa@gmail.com',
        	'profile' => 'EMPLOYEE',
        	'status' => 'ACTIVE',
        	'password' => bcrypt('123')
        ])->assignRole('Cliente');
        User::create([
            'name' => 'cristian castiblanco',
            'phone' => '3015384586',
            'email' => 'cristian@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('123'),
        ])->assignRole('Admin');
        User::create([
            'name' => 'kevin calderon',
            'phone' => '3045575928',
            'email' => 'kevin@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('123'),
        ])->assignRole('Admin');
        User::create([
            'name' => 'maria alejandra',
            'phone' => '3105646189',
            'email' => 'maria@gmail.com',
            'profile' => 'EMPLOYEE',
            'status' => 'ACTIVE',
            'password' => bcrypt('123'),
        ])->assignRole('Cliente');
        User::create([
            'name' => 'sara araujo',
            'phone' => '3105646100',
            'email' => 'sara@gmail.com',
            'profile' => 'EMPLOYEE',
            'status' => 'LOCKED',
            'password' => bcrypt('123'),
        ])->assignRole('Cliente');
    }
}
