<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataAnggotaResource\Pages;
use App\Models\DataAnggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;

class DataAnggotaResource extends Resource
{
    protected static ?string $model = DataAnggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('avatar')
                ->image()
                ->required(),
                
            TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),
            
            TextInput::make('nim')
                ->label('NIM')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(20),

            TextInput::make('kelas')
                ->label('Kelas')
                ->required()
                ->maxLength(50),

            TextInput::make('program_studi')
                ->label('Program Studi')
                ->required()
                ->maxLength(100),

            TextInput::make('jurusan')
                ->label('Jurusan')
                ->required()
                ->maxLength(100),

            TextInput::make('instansi')
                ->label('Instansi')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn :: make('avatar'),

                TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable(),

                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),

                TextColumn::make('kelas')
                    ->label('Kelas'),

                TextColumn::make('program_studi')
                    ->label('Program Studi'),

                TextColumn::make('jurusan')
                    ->label('Jurusan'),

                TextColumn::make('instansi')
                    ->label('Instansi'),
            ])
            ->filters([
            ])
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
            'index' => Pages\ListDataAnggotas::route('/'),
            'create' => Pages\CreateDataAnggota::route('/create'),
            'edit' => Pages\EditDataAnggota::route('/{record}/edit'),
        ];
    }
}
