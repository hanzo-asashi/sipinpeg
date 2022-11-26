<?php

namespace App\Filament\Resources\InstansiResource\Pages;

use App\Filament\Resources\InstansiResource;
use App\Utilities\Helpers;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageInstansis extends ManageRecords
{
    protected static string $resource = InstansiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->mutateFormDataUsing(function (array $data): array {
                $data['kode_instansi'] = Helpers::generateKode('INS');

                return $data;
            }),
        ];
    }
}
