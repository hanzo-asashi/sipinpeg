<?php

declare(strict_types=1);

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;
use Reworck\FilamentSettings\FilamentSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Filament::serving(static function () {
            Filament::registerViteTheme('resources/css/filament.css');
        });

        Column::macro('sortableMany', function () {
            return $this->sortable(query: function (Builder $query, string $direction, $column): Builder {
                [$table, $field] = explode('.', $column->getName());

                return $query->withAggregate($table, $field)
                    ->orderBy(implode('_', [$table, $field]), $direction);
            });
        });

        FilamentSettings::setFormFields([
            Section::make('Template Surat')
                ->description('Input Nama Kop Surat, Perihal, Ditujukan Kepada, Penandatangan, dll ')
                ->aside()
                ->schema([
                    TextInput::make('kop_surat'),
                    TextInput::make('nomor_surat'),
                    TextInput::make('lampiran'),
                    TextInput::make('perihal'),
                    TextInput::make('ditujukan_ke'),
                    TextInput::make('tujuan'),
                    TextInput::make('nama_penandatangan'),
                    TextInput::make('nip_penandatangan'),
                ])
                ->id('template_surat_setting')
                ->compact(),
            Section::make('Sistem')
                ->description('Nama Aplikasi, Format Tanggal, dll')
                ->aside()
                ->schema([
                    TextInput::make('nama_aplikasi'),
                    TextInput::make('format_tanggal')->default('d M Y'),
                    TextInput::make('format_tanggal_jam')->default('d M Y H:i:s'),
                    TextInput::make('pemisah_tanggal')->default('-'),
                    TextInput::make('tahun_awal')->default(now()->year),
                ])
                ->id('sistem_setting')
                ->compact(),
        ]);

//        FilamentEnvironmentIndicator::configureUsing(function (FilamentEnvironmentIndicator $indicator) {
//            $indicator->visible = fn () => auth()->user()?->can('see_indicator');
//        }, isImportant: true);
//
//        FilamentEnvironmentIndicator::configureUsing(function (FilamentEnvironmentIndicator $indicator) {
//            $indicator->color = fn () => match (app()->environment()) {
//                'production' => null,
//                'staging' => 'orange',
//                default => 'blue',
//            };
//        }, isImportant: true);
//
//        FilamentEnvironmentIndicator::configureUsing(function (FilamentEnvironmentIndicator $indicator) {
//            $indicator->showBadge = fn () => false;
//            $indicator->showBorder = fn () => true;
//        }, isImportant: true);
    }
}
