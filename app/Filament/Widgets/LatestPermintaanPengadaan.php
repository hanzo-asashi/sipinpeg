<?php

namespace App\Filament\Widgets;

use App\Models\PermintaanPengadaan;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestPermintaanPengadaan extends BaseWidget
{
    protected static ?string $heading = 'Permintaan Pengadaan Terbaru';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return PermintaanPengadaan::query()->latest()->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('instansi.nama_instansi'),
            Tables\Columns\TextColumn::make('rekening.nama_rekening'),
            Tables\Columns\TextColumn::make('waktu_pelaksanaan'),
            Tables\Columns\TextColumn::make('waktu_barang_diterima'),

        ];
    }
}
