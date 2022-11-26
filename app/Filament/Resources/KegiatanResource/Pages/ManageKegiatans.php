<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use App\Utilities\Helpers;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKegiatans extends ManageRecords
{
    protected static string $resource = KegiatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['kode_kegiatan'] = Helpers::generateKodeKegiatan('KEG');

                    return $data;
                }),
        ];
    }
}
