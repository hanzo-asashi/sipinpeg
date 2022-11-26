<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubKegiatanResource\Pages;
use App\Filament\Resources\SubKegiatanResource\RelationManagers;
use App\Models\SubKegiatan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubKegiatanResource extends Resource
{
    protected static ?string $model = SubKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 4;
    protected static ?string $pluralLabel = 'Sub Kegiatan';
    protected static ?string $modelLabel = 'Sub Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kegiatan_id')
                    ->relationship('kegiatan', 'nama_kegiatan')
                    ->required(),
                Forms\Components\TextInput::make('nama_sub_kegiatan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kegiatan.nama_kegiatan'),
                Tables\Columns\TextColumn::make('nama_sub_kegiatan'),
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
            'index' => Pages\ManageSubKegiatans::route('/'),
        ];
    }
}
