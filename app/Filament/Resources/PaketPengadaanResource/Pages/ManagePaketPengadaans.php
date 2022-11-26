<?php

namespace App\Filament\Resources\PaketPengadaanResource\Pages;

use App\Filament\Resources\PaketPengadaanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePaketPengadaans extends ManageRecords
{
    protected static string $resource = PaketPengadaanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
