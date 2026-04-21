<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Supplier::insert([
            [
                'supplier_kode' => 'SUP01',
                'supplier_nama' => 'PT Indofood',
                'supplier_alamat' => 'Jakarta',
            ],
            [
                'supplier_kode' => 'SUP02',
                'supplier_nama' => 'PT Wings',
                'supplier_alamat' => 'Surabaya',
            ],
        ]);
    }
}
