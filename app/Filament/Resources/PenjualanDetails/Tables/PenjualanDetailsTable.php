<?php

namespace App\Filament\Resources\PenjualanDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PenjualanDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('penjualan.penjualan_kode')
                    ->label('Kode Penjualan')
                    ->sortable(),

                TextColumn::make('barang.barang_nama')
                    ->label('Barang')
                    ->sortable(),

                TextColumn::make('harga')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
