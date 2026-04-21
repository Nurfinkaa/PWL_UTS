<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Barang::insert([
        [
            'kategori_id' => 1,
            'barang_kode' => 'BRG01',
            'barang_nama' => 'Indomie Goreng',
            'harga_beli' => 2500,
            'harga_jual' => 3000,
        ],
        [
            'kategori_id' => 2,
            'barang_kode' => 'BRG02',
            'barang_nama' => 'Teh Botol',
            'harga_beli' => 4000,
            'harga_jual' => 5000,
        ],
        ]);
    }
}
