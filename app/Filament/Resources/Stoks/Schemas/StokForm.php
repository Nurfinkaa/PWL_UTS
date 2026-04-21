<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\MUser;


class StokForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('barang_id') 
                    ->relationship('barang', 'barang_nama') 
                    ->required(),
                Select::make('supplier_id') 
                    ->relationship('supplier', 'supplier_nama') 
                    ->required(),
                Select::make('user_id') 
                    ->relationship('user', 'nama') 
                    ->required(),
                DatePicker::make('tanggal')
                    ->required(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
            ]);
    }
}
