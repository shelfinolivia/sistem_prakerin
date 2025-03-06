<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NamaModelResource\Pages;
use App\Filament\Resources\NamaModelResource\RelationManagers;
use App\Models\NamaModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NamaModelResource extends Resource
{
    protected static ?string $model = NamaModel::class;

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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListNamaModels::route('/'),
            'create' => Pages\CreateNamaModel::route('/create'),
            'edit' => Pages\EditNamaModel::route('/{record}/edit'),
        ];
    }
}
