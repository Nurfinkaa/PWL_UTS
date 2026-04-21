<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;


class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'nama')
                    ->searchable()
                    ->required(),
                DatePicker::make('tanggal')
                    ->required(),
                TextInput::make('total_harga')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
