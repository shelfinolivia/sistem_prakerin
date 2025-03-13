<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanSiswaResource\Pages;
use App\Models\Report;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Support\HtmlString;

class LaporanSiswaResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_file')
                    ->label('Nama File')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->badge()
                    ->colors([
                        'success' => 'terkirim',
                        'warning' => 'belum dikirim',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Unggah')
                    ->dateTime('d M Y - H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y - H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'terkirim' => 'Terkirim',
                        'belum dikirim' => 'Belum Dikirim',
                    ]),
            ])
            ->actions([
                Action::make('view')
                ->label('Lihat')
                ->icon('heroicon-o-eye')
                ->modalHeading('Lihat Laporan')
                ->modalSubmitAction(false) // Hilangkan tombol submit
                ->modalCancelActionLabel('Tutup')
                ->modalWidth('full') // Modal full screen
                ->modalContent(fn (Report $record) => new HtmlString(
                    '<div class="w-full h-[90vh]">
                        <iframe src="' . asset('storage/' . $record->file_path) . '" 
                            class="w-full h-full border border-gray-300">
                        </iframe>
                    </div>'
                )),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanSiswas::route('/'),
            'create' => Pages\CreateLaporanSiswa::route('/create'),
            'edit' => Pages\EditLaporanSiswa::route('/{record}/edit'),
        ];
    }
}
