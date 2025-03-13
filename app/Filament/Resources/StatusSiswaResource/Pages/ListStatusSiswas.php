<?php

namespace App\Filament\Resources\StatusSiswaResource\Pages;

use App\Filament\Resources\StatusSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusSiswas extends ListRecords
{
    protected static string $resource = StatusSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
