<?php

namespace App\Filament\Resources\PenjualanDetails\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Select::make('penjualan_id')
                    ->label('Penjualan')
                    ->relationship('penjualan', 'penjualan_kode')
                    ->required(),

                Select::make('barang_id')
                    ->label('Barang')
                    ->relationship('barang', 'barang_nama')
                    ->required(),

                TextInput::make('jumlah')
                    ->numeric()
                    ->required(),

                TextInput::make('harga')
                    ->numeric()
                    ->required(),

            ]);
    }
}
