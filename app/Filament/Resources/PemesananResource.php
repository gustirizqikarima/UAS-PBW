<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemesananResource\Pages;
use App\Models\Pemesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class PemesananResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('barang_id')
                ->label('Barang')
                ->relationship('barang', 'nama_barang')
                ->required(),

            Select::make('pemasok_id')
                ->label('Pemasok')
                ->relationship('pemasok', 'nama_pemasok')
                ->required(),

            TextInput::make('jumlah')
                ->label('Jumlah')
                ->numeric()
                ->required(),

            TextInput::make('total_harga')
                ->label('Total Harga')
                ->numeric()
                ->required(),

            DatePicker::make('tanggal_pemesanan')
                ->label('Tanggal Pemesanan')
                ->default(now())
                ->required(),

            DatePicker::make('tanggal_pengiriman')
                ->label('Tanggal Pengiriman')
                ->required(),

            TextInput::make('status')
                ->label('Status')
                ->default('pending'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama_barang')
                    ->label('Barang')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pemasok.nama_pemasok')
                    ->label('Pemasok')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),

                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('IDR'),

                TextColumn::make('tanggal_pemesanan')
                    ->label('Tanggal Pemesanan')
                    ->date(),

                TextColumn::make('tanggal_pengiriman')
                    ->label('Tanggal Pengiriman')
                    ->date(),

                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
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
            'index' => Pages\ListPemesanans::route('/'),
            'create' => Pages\CreatePemesanan::route('/create'),
            'edit' => Pages\EditPemesanan::route('/{record}/edit'),
        ];
    }
}
