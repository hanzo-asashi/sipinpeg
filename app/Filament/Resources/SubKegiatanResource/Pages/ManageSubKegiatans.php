<?php

namespace App\Filament\Resources\SubKegiatanResource\Pages;

use App\Filament\Resources\SubKegiatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSubKegiatans extends ManageRecords
{
    protected static string $resource = SubKegiatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
