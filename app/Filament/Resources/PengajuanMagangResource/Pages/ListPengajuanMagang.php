<?php

namespace App\Filament\Resources\PengajuanMagangResource\Pages;

use App\Filament\Resources\PengajuanMagangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Resource;
use App\Filament\Resources\PengajuanMagangResource\Pages\CreatePengajuanMagang;
use App\Filament\Resources\PengajuanMagangResource\Pages\EditPengajuanMagang;
use App\Filament\Resources\PengajuanMagangResource\Pages;

class ListPengajuanMagang extends ListRecords
{
    protected static string $resource = PengajuanMagangResource::class;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanMagang::route('/'),
            'create' => Pages\CreatePengajuanMagang::route('/create'),
            'edit' => Pages\EditPengajuanMagang::route('/{record}/edit'),
        ];
               
        
    }
    
}
