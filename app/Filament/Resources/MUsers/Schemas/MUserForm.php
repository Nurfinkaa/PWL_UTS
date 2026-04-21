<?php

namespace App\Filament\Resources\MUsers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class MUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->label('Level')
                    ->relationship('level', 'level_nama')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
            ]);
    }
}
