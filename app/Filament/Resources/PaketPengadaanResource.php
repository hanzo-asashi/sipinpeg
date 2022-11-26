<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketPengadaanResource\Pages;
use App\Filament\Resources\PaketPengadaanResource\RelationManagers;
use App\Models\PaketPengadaan;
use App\Utilities\Helpers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketPengadaanResource extends Resource
{
    protected static ?string $model = PaketPengadaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 5;
    protected static ?string $pluralLabel = 'Paket Pengadaan';
    protected static ?string $modelLabel = 'Paket Pengadaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\MarkdownEditor::make('nama_paket_pengadaan')
                    ->required()->columnSpanFull(),
                Forms\Components\TextInput::make('kode_rup')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('pagu'),
                Forms\Components\TextInput::make('hps'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_paket_pengadaan')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kode_rup')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('pagu')->searchable()->sortable()
                    ->formatStateUsing(fn ($state) => Helpers::format_indonesia($state)),
                Tables\Columns\TextColumn::make('hps')->searchable()->sortable()
                    ->formatStateUsing(fn ($state) => Helpers::format_indonesia($state)),
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
            'index' => Pages\ManagePaketPengadaans::route('/'),
        ];
    }
}
