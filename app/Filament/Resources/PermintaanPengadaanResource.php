<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\PermintaanPengadaanResource\Pages;
use App\Filament\Resources\PermintaanPengadaanResource\RelationManagers;
use App\Models\PermintaanPengadaan;
use App\Models\Produk;
use Awcodes\FilamentBadgeableColumn\Components\Badge;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermintaanPengadaanResource extends Resource
{
    protected static ?string $model = PermintaanPengadaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static?string $pluralLabel = 'Permintaan Pengadaan';
    protected static?string $pluralModelLabel = 'Permintaan Pengadaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('instansi_id')
                    ->relationship('instansi', 'nama_instansi')
                    ->required(),
                Forms\Components\Select::make('sub_instansi_id')
                    ->relationship('sub_instansi', 'nama_sub_instansi')
                    ->required(),
                Forms\Components\Select::make('kegiatan_id')
                    ->relationship('kegiatan', 'nama_kegiatan')
                    ->required(),
                Forms\Components\Select::make('sub_kegiatan_id')
                    ->relationship('sub_kegiatan', 'nama_sub_kegiatan')
                    ->required(),
                Forms\Components\Select::make('rekening_id')
                    ->relationship('rekening', 'nama_rekening')
                    ->required(),
                Forms\Components\Select::make('program_id')
                    ->relationship('program', 'nama_program')
                    ->required(),
                Forms\Components\Select::make('paket_pengadaan_id')
                    ->label('Paket Pengadaan')
                    ->relationship('paketpengadaan', 'nama_paket_pengadaan')
                    ->required(),
                Forms\Components\DatePicker::make('waktu_pelaksanaan')->displayFormat('d M Y'),
                Forms\Components\DatePicker::make('waktu_barang_diterima')->displayFormat(' d M Y'),
                Forms\Components\TextInput::make('lokasi_barang')
                    ->required()
                    ->maxLength(200),
                Forms\Components\Repeater::make('produk_id')
                    ->relationship('produks')
                    ->schema([
                        Forms\Components\Select::make('nama_produk')
                            ->options(Produk::pluck('nama_produk','nama_produk')),
                        Forms\Components\TextInput::make('volume')
                    ])
                    ->defaultItems(2)
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\MarkdownEditor::make('informasi_lainnya')
                    ->columnSpanFull()
                    ->maxLength(65535),
                Forms\Components\MarkdownEditor::make('spesifikasi_teknis_lainnya')
                    ->columnSpanFull()
                    ->maxLength(65535),
//                Forms\Components\Repeater::make('kualifikasi_kinerja')
//                    ->schema([
//                        Forms\Components\TextInput::make('nama_kualifikasi')
//                    ]),
                Forms\Components\MarkdownEditor::make('kualifikasi_kinerja')
                    ->columnSpanFull()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('instansi.nama_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('sub_instansi.nama_sub_instansi')->searchable()->sortable(),
//                Tables\Columns\TextColumn::make('kegiatan.nama_kegiatan'),
//                Tables\Columns\TextColumn::make('sub_kegiatan.nama_sub_kegiatan'),
                Tables\Columns\TextColumn::make('rekening.nama_rekening'),
//                Tables\Columns\TextColumn::make('program.nama_program'),
//                Tables\Columns\TextColumn::make('produk.nama_produk'),
//                Tables\Columns\TextColumn::make('paketpengadaan.nama_paket_pengadaan'),
                Tables\Columns\TextColumn::make('waktu_pelaksanaan')->searchable()->sortable()
                    ->date('d M Y'),
                Tables\Columns\TextColumn::make('waktu_barang_diterima')->searchable()->sortable()
                    ->date('d M Y'),
//                Tables\Columns\TextColumn::make('lokasi_barang'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPermintaanPengadaans::route('/'),
            'create' => Pages\CreatePermintaanPengadaan::route('/create'),
            'edit' => Pages\EditPermintaanPengadaan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
