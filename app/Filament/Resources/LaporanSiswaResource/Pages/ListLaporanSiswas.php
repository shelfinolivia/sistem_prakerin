<?php

namespace App\Filament\Resources\LaporanSiswaResource\Pages;

use App\Filament\Resources\LaporanSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanSiswas extends ListRecords
{
    protected static string $resource = LaporanSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
