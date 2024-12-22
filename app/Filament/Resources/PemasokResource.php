<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemasokResource\Pages;
use App\Models\Pemasok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PemasokResource extends Resource
{
    protected static ?string $model = Pemasok::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_pemasok')
                ->label('Nama Pemasok')
                ->required(),

            TextInput::make('kontak')
                ->label('Kontak'),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            TextInput::make('alamat')
                ->label('Alamat')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pemasok')
                    ->label('Nama Pemasok')
                    ->searchable(),

                TextColumn::make('kontak')
                    ->label('Kontak'),

                TextColumn::make('email')
                    ->label('Email'),

                TextColumn::make('alamat')
                    ->label('Alamat'),
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
            'index' => Pages\ListPemasoks::route('/'),
            'create' => Pages\CreatePemasok::route('/create'),
            'edit' => Pages\EditPemasok::route('/{record}/edit'),
        ];
    }
}
