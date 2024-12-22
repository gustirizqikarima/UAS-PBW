<?php

namespace App\Filament\Resources;

use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BarangResource\Pages;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('kode_barang')
                ->label('Kode Barang')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(20), // Tipe data string pendek

            TextInput::make('nama_barang')
                ->label('Nama Barang')
                ->required()
                ->maxLength(255), // Tipe data string panjang

            TextInput::make('kategori')
                ->label('Kategori')
                ->maxLength(100), // String opsional

            TextInput::make('satuan')
                ->label('Satuan')
                ->required()
                ->default('pcs')
                ->maxLength(10), // String untuk satuan (pcs, kg, dll)

            TextInput::make('stok')
                ->label('Stok')
                ->numeric()
                ->required(), // Integer atau numeric

            TextInput::make('harga_satuan')
                ->label('Harga Satuan')
                ->numeric()
                ->required(), // Decimal atau integer untuk harga
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_barang')
                    ->label('Kode Barang')
                    ->searchable(),

                TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->searchable(),

                TextColumn::make('kategori')
                    ->label('Kategori'),

                TextColumn::make('satuan')
                    ->label('Satuan'),

                TextColumn::make('stok')
                    ->label('Stok'),

                TextColumn::make('harga_satuan')
                    ->label('Harga Satuan')
                    ->money('IDR'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
