<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubInstansiResource\Pages;
use App\Filament\Resources\SubInstansiResource\RelationManagers;
use App\Models\SubInstansi;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubInstansiResource extends Resource
{
    protected static ?string $model = SubInstansi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 2;
    protected static ?string $pluralLabel = 'Sub Instansi';
    protected static ?string $modelLabel = 'Sub Instansi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('instansi_id')
                    ->relationship('instansi', 'nama_instansi')
                    ->required(),
                Forms\Components\TextInput::make('nama_sub_instansi')
                    ->required()
                    ->maxLength(150),
                Forms\Components\TextInput::make('short_nama_sub')
                    ->label('Alias')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('instansi.nama_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kode_sub_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama_sub_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('short_nama_sub')->searchable()->sortable()
                ->label('Alias'),
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
            'index' => Pages\ManageSubInstansis::route('/'),
        ];
    }
}
