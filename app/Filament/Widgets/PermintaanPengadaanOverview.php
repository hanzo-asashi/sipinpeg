<?php

namespace App\Filament\Widgets;

use App\Models\Instansi;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PermintaanPengadaanOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static ?string $pollingInterval = '10s';

    public static function canView(): bool
    {
        return auth()->user()->is_admin === true;
    }

    protected function getCards(): array
    {
        $user = User::query();
        $totalUsers = $user->count();
        $pp = $user->role('pp')->count();
        $ppk = $user->role('ppk')->count();
        $instansi = Instansi::query()->count();
        return [
            Card::make('Total Pengguna', $totalUsers)
                ->description('Total Semua Pengguna')
//                ->descriptionIcon('heroicon-s-trending-up')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Card::make('Total Pejabat Pengadaan', $pp)
                ->description('Jumlah Pejabat Pengadaan')
//                ->descriptionIcon('heroicon-s-trending-down')
                ->color('danger'),
            Card::make('Total PPK', $ppk)
                ->description('Jumlah Pejabat Pembuat Komitmen')
//                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Total SKPD', $instansi)
                ->description('Jumlah Instansi / SKPD')
//                ->descriptionIcon('heroicon-s-trending-up')
                ->color('warning'),
        ];
    }
}
