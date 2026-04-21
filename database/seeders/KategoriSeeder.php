<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Kategori::insert([
        ['kategori_kode' => 'KTG01', 'kategori_nama' => 'Makanan'],
        ['kategori_kode' => 'KTG02', 'kategori_nama' => 'Minuman'],
        ]);
    }
}
