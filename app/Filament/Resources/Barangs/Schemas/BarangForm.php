<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'kategori_nama')
                    ->required(),
                TextInput::make('barang_kode')
                    ->required(),
                TextInput::make('barang_nama')
                    ->required(),
                TextInput::make('harga_beli')
                    ->required()
                    ->numeric(),
                TextInput::make('harga_jual')
                    ->required()
                    ->numeric(),
            ]);
    }
}
