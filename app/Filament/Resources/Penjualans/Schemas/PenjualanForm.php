<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Illuminate\Validation\Rules\Unique; 
use App\Models\MUser;


class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->options(fn () => MUser::pluck('nama', 'user_id')->toArray())
                    ->searchable()
                    ->required(),
                TextInput::make('pembeli')
                    ->label('Pembeli')
                    ->required(),
                TextInput::make('penjualan_kode')
                    ->required()
                    ->unique(ignoreRecord: true),
                DateTimePicker::make('penjualan_tanggal')
                    ->required(),

            ]);
    }
}
