<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\BarChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PermintaanPengadaanChart extends BarChartWidget
{
    protected static ?string $heading = 'Statistik Permintaan Pengadaan';
    protected static ?int $sort = 3;
    public ?string $filter = 'today';
    protected static ?string $maxHeight = '400px';
    protected static ?string $pollingInterval = '10s';
    protected int | string | array $columnSpan = 'full';
//    protected int | string | array $columnSpan = [
//        'md' => 4,
//        'xl' => 5,
//    ];
    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
    ];

    protected function getData(): array
    {
//        $activeFilter = $this->filter;
//        $data = Trend::model(User::class)
//            ->between(
//                start: now()->startOfYear(),
//                end: now()->endOfYear(),
//            )
//            ->perMonth()
//            ->count();
//
//        return [
//            'datasets' => [
//                [
//                    'label' => 'User',
//                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
//                ],
//            ],
//            'labels' => $data->map(fn (TrendValue $value) => $value->date),
//        ];
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Permintaan Pengadaan Per Bulan',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
