<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('barang_id')
                ->label('Barang')
                ->relationship('barang', 'nama_barang')
                ->required(),

            Select::make('jenis_transaksi')
                ->label('Jenis Transaksi')
                ->options([
                    'masuk' => 'Masuk',
                    'keluar' => 'Keluar',
                ])
                ->required(),

            TextInput::make('jumlah')
                ->label('Jumlah')
                ->numeric()
                ->required(),

            TextInput::make('harga_total')
                ->label('Harga Total')
                ->numeric()
                ->required(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama_barang')
                    ->label('Barang'),

                TextColumn::make('jenis_transaksi')
                    ->label('Jenis Transaksi')
                    ->sortable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah'),

                TextColumn::make('harga_total')
                    ->label('Harga Total')
                    ->money('IDR'),

                TextColumn::make('keterangan')
                    ->label('Keterangan'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
