<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;

class SuratPermintaanPengadaan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.surat-permintaan-pengadaan';

    protected function getFormSchema(): array
    {
        return [
            Fieldset::make('label')
                ->schema([
                    TextInput::make('kop_surat'),
                    TextInput::make('nomor_surat'),
                ])
        ];
    }
}
