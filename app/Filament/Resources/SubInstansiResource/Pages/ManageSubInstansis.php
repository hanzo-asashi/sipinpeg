<?php

namespace App\Filament\Resources\SubInstansiResource\Pages;

use App\Filament\Resources\SubInstansiResource;
use App\Utilities\Helpers;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSubInstansis extends ManageRecords
{
    protected static string $resource = SubInstansiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['kode_sub_instansi'] = Helpers::generateKodeSubSkpd($data['instansi_id']);

                return $data;
            }),
        ];
    }
}
