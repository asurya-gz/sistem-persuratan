<?php

namespace Database\Seeders;

use App\Models\resident;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'name' => 'Admin Desa',
            'email' => 'admindesa@gmail.com',
            'password' => 'password',
            'status' => 'approved',
            'role_id' => '1', // =>Admin
        ]);

        User::create([
            'id' => '2',
            'name' => 'Penduduk 1',
            'email' => 'penduduk@gmail.com',
            'password' => 'password123',
            'status' => 'approved',
            'role_id' => '2',
        ]);

        resident::create([
            'user_id' => '2',
            'nik' => '9876543217654832',
            'name' => 'komputer',
            'gender' => 'female',
            'birth_date' => '2005-01-01',
            'birth_place' => 'Jakarta',
            'address' => 'cilegon',
            'material_status' => 'single',
        ]);
    }
}
