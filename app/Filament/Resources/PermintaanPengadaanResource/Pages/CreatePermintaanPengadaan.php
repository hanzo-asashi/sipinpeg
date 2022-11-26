<?php

namespace App\Filament\Resources\PermintaanPengadaanResource\Pages;

use App\Filament\Resources\PermintaanPengadaanResource;
use App\Models\Produk;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Pages\Actions;
use Filament\Resources\Pages\Concerns\HasWizard;
use Filament\Resources\Pages\CreateRecord;

class CreatePermintaanPengadaan extends CreateRecord
{
//    use HasWizard;

    protected static string $resource = PermintaanPengadaanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

//    protected function getSteps(): array
//    {
//        return [
//            Step::make('instansi')
//                ->description('Pilih instansi atau SKPD serta Sub Instansi / Sub SKPD')
//                ->schema([
//                    Select::make('instansi_id')->relationship('instansi', 'nama_instansi')
//                        ->required(),
//                    Select::make('sub_instansi_id')
//                        ->relationship('sub_instansi', 'nama_sub_instansi')
//                        ->required(),
//                ]),
//            Step::make('kegiatan')
//                ->description('Kegiatan, Sub kegiatan, Rekening, dan Program')
//                ->schema([
//                    Select::make('kegiatan_id')
//                        ->relationship('kegiatan', 'nama_kegiatan')
//                        ->required(),
//                    Select::make('sub_kegiatan_id')
//                        ->relationship('sub_kegiatan', 'nama_sub_kegiatan')
//                        ->required(),
//                    Select::make('rekening_id')
//                        ->relationship('rekening', 'nama_rekening')
//                        ->required(),
//                    Select::make('program_id')
//                        ->relationship('program', 'nama_program')
//                        ->required(),
//                ]),
//            Step::make('produk')
//                ->description('Buat Produk')
//                ->schema([
//                    Repeater::make('produk_id')
//                        ->relationship('produks')
//                        ->schema([
//                            Select::make('nama_produk')
//                                ->options(Produk::pluck('nama_produk', 'nama_produk')),
//                            TextInput::make('volume')
//                        ])
//                        ->defaultItems(2)
//                        ->required(),
//                ]),
//            Step::make('paket pengadaan')
//                ->description('Paket Pengadaan, Waktu Pelaksanaan, Waktu Barang Diterima, dan Lokasi Barang')
//                ->schema([
//                    Select::make('paket_pengadaan_id')
//                        ->label('Paket Pengadaan')
//                        ->relationship('paketpengadaan', 'nama_paket_pengadaan')
//                        ->required(),
//                    DatePicker::make('waktu_pelaksanaan')->displayFormat('d M Y'),
//                    DatePicker::make('waktu_barang_diterima')->displayFormat(' d M Y'),
//                    TextInput::make('lokasi_barang')
//                        ->required()
//                        ->maxLength(200),
//                ]),
//            Step::make('informasi lainnya')
//                ->description('Input Informasi Lainnya, Spesifikasi Teknis Lainnya, Serta Kualifikasi Kinerja')
//                ->schema([
//                    MarkdownEditor::make('informasi_lainnya')
//                        ->maxLength(65535),
//                    MarkdownEditor::make('spesifikasi_teknis_lainnya')
//                        ->maxLength(65535),
//                    MarkdownEditor::make('kualifikasi_kinerja')
//                        ->maxLength(65535),
//                ]),
//        ];
//    }
}
