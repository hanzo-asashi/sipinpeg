<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemplateSuratResource\Pages;
use App\Filament\Resources\TemplateSuratResource\RelationManagers;
use App\Models\TemplateSurat;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemplateSuratResource extends Resource
{
    protected static ?string $model = TemplateSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 9;
    protected static ?string $pluralLabel = 'Template Surat';
    protected static ?string $modelLabel = 'Template Surat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_surat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_surat')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('lampiran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('perihal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ditujukan_ke')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tujuan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_penandatangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip_penandatangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_surat')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_surat'),
                Tables\Columns\TextColumn::make('nomor_surat'),
                Tables\Columns\TextColumn::make('lampiran'),
                Tables\Columns\TextColumn::make('perihal'),
                Tables\Columns\TextColumn::make('ditujukan_ke'),
                Tables\Columns\TextColumn::make('tujuan'),
                Tables\Columns\TextColumn::make('nama_penandatangan'),
                Tables\Columns\TextColumn::make('nip_penandatangan'),
                Tables\Columns\TextColumn::make('tanggal_surat')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTemplateSurats::route('/'),
        ];
    }
}
