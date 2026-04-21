<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MUser;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MUser::insert([
        [
            'level_id' => 1,
            'username' => 'admin',
            'nama' => 'Admin',
            'password' => Hash::make('123456'),
        ],
        [
            'level_id' => 2,
            'username' => 'kasir',
            'nama' => 'Kasir',
            'password' => Hash::make('123456'),
        ],
        ]);
    }
}
