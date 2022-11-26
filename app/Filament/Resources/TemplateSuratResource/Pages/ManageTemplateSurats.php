<?php

namespace App\Filament\Resources\TemplateSuratResource\Pages;

use App\Filament\Resources\TemplateSuratResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTemplateSurats extends ManageRecords
{
    protected static string $resource = TemplateSuratResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
