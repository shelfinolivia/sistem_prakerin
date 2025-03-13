<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatusSiswaResource\Pages;
use App\Filament\Resources\StatusSiswaResource\RelationManagers;
use App\Models\StatusSiswa;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusSiswaResource extends Resource
{
    protected static ?string $model = StatusSiswa::class;

    protected static ?string $navigationGroup = "Pengajuan";

    protected static ?string $label = "Status Pengajuan Siswa";

    protected static ?string $navigationLabel = "Status Siswa";
    
    protected static ?string $modelLabel = "Status Siswa";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama_siswa')->label('Nama'),
            TextColumn::make('kelas')->label('Kelas'),
            TextColumn::make('posisi_magang')->label('Posisi Magang'),
            TextColumn::make('status')
                ->formatStateUsing(fn( Bool $state) => $state ? "Accept" : "Denied")
                ->badge()
                ->color(fn(Bool $state) => $state ? "success" : "danger"),
            TextColumn::make('tanggal_mulai')->formatStateUsing(function($state){
                $date = Carbon::parse($state)->locale('id');
                $date->settings(['formatFunction' => 'translatedFormat']);
                return $date->format('l, j F Y');
            }),
            TextColumn::make('tanggal_selesai')->formatStateUsing(function($state){
                $date = Carbon::parse($state)->locale('id');
                $date->settings(['formatFunction' => 'translatedFormat']);
                return $date->format('l, j F Y');
            }),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\DeleteAction::make(), // Mengganti Edit dengan Delete
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatusSiswas::route('/'),
            'create' => Pages\CreateStatusSiswa::route('/create'),
            'edit' => Pages\EditStatusSiswa::route('/{record}/edit'),
        ];
    }
}
