<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstansiResource\Pages;
use App\Filament\Resources\InstansiResource\RelationManagers;
use App\Models\Instansi;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralLabel = 'Instansi';
    protected static ?string $modelLabel = 'Instansi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('kode_instansi')
//                    ->required()
//                    ->maxLength(30),
                Forms\Components\TextInput::make('nama_instansi')
                    ->required()
                    ->maxLength(150),
                Forms\Components\TextInput::make('short_name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('npwp_instansi')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('short_name')->searchable()->sortable()
                ->label('Alias'),
                Tables\Columns\TextColumn::make('npwp_instansi')->searchable()->sortable()
                ->label('NPWP Instansi'),
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
            'index' => Pages\ManageInstansis::route('/'),
        ];
    }
}
