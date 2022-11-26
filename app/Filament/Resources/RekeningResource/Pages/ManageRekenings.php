<?php

namespace App\Filament\Resources\RekeningResource\Pages;

use App\Filament\Resources\RekeningResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRekenings extends ManageRecords
{
    protected static string $resource = RekeningResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
