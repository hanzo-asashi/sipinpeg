<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Tables\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;

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
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
//            return app(\Illuminate\Foundation\Vite::class)('resources/' . $path);
        });

        Column::macro('sortableMany', function () {
            return $this->sortable(query: function (Builder $query, string $direction, $column): Builder {
                [$table, $field] = explode('.', $column->getName());

                return $query->withAggregate($table, $field)
                    ->orderBy(implode('_', [$table, $field]), $direction);
            });
        });

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
