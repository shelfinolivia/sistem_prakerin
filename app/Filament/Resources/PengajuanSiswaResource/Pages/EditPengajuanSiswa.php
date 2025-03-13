<?php

namespace App\Filament\Resources\PengajuanSiswaResource\Pages;

use App\Filament\Resources\PengajuanSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengajuanSiswa extends EditRecord
{
    protected static string $resource = PengajuanSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
