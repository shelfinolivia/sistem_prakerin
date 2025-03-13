<?php

namespace App\Filament\Resources\StatusSiswaResource\Pages;

use App\Filament\Resources\StatusSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusSiswa extends EditRecord
{
    protected static string $resource = StatusSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
