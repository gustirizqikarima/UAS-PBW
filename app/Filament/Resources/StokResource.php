<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokResource\Pages;
use App\Models\Stok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('barang_id')
                ->label('Barang')
                ->relationship('barang', 'nama_barang')
                ->required(),
            TextInput::make('jumlah')->numeric()->required(),
            TextInput::make('lokasi')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama_barang')->label('Barang'),
                TextColumn::make('jumlah')->label('Jumlah'),
                TextColumn::make('lokasi')->label('Lokasi'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStoks::route('/'),
            'create' => Pages\CreateStok::route('/create'),
            'edit' => Pages\EditStok::route('/{record}/edit'),
        ];
    }
}
