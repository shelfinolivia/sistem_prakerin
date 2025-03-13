<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanSiswaResource\Pages;
use App\Models\PengajuanSiswa;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use App\Models\StatusSiswa;

class PengajuanSiswaResource extends Resource
{
    protected static ?string $model = PengajuanSiswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Pengajuan Siswa';
    protected static ?string $pluralLabel = 'Pengajuan Siswa';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_siswa')->label('Nama Siswa')->searchable(),
                TextColumn::make('kelas')->label('Kelas'),
                TextColumn::make('nama_perusahaan')->label('Perusahaan'),
                TextColumn::make('posisi_magang')->label('Posisi'),
                TextColumn::make('status')->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'diterima' => 'success',
                        'ditolak' => 'danger',
                    }),
            ])
            ->actions([
                Action::make('terima')
                    ->label('Terima')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->modalHeading('Konfirmasi Penerimaan Magang')
                    ->label('Simpan')
                    ->hidden(fn (PengajuanSiswa $record) => $record->status !== 'pending')
                    ->form([
                        Forms\Components\TextInput::make('perusahaan')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->default(fn (PengajuanSiswa $record) => $record->nama_perusahaan),

                        Forms\Components\TextInput::make('posisi')
                            ->label('Posisi Magang')
                            ->required()
                            ->default(fn (PengajuanSiswa $record) => $record->posisi_magang),

                        Forms\Components\DatePicker::make('tanggal_mulai')
                            ->label('Tanggal Mulai')
                            ->required(),

                        Forms\Components\DatePicker::make('tanggal_selesai')
                            ->label('Tanggal Selesai')
                            ->required(),

                        Forms\Components\Textarea::make('alasan')
                            ->label('Alasan Penerimaan')
                            ->required(),
                    ])
                    ->action(function (array $data, PengajuanSiswa $record, Tables\Actions\Action $action) {
                        $record->update([
                            'nama_perusahaan' => $data['perusahaan'],
                            'posisi_magang' => $data['posisi'],
                            'tanggal_mulai' => $data['tanggal_mulai'],
                            'tanggal_selesai' => $data['tanggal_selesai'],
                            'alasan' => $data['alasan'],
                            'status' => 'diterima',
                        ]);

                        StatusSiswa::create([
                            'pengajuan_siswa_id' => $record->siswa_id,
                            'nama_siswa' => $record->nama_siswa,
                            'kelas' => $record->kelas,
                            'nama_perusahaan' => $data['perusahaan'],
                            'posisi_magang' => $data['posisi'],
                            'tanggal_mulai' => $data['tanggal_mulai'],
                            'tanggal_selesai' => $data['tanggal_selesai'],
                            'status' => true,
                        ]);

                        Notification::make()
                            ->title('Pengajuan Diterima')
                            ->success()
                            ->body("Pengajuan magang telah diterima dan disimpan ke status siswa.")
                            ->send();                          
                    }),

                Action::make('tolak')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->modalHeading('Konfirmasi Penolakan Magang')
                    ->hidden(fn (PengajuanSiswa $record) => $record->status !== 'pending')
                    ->form([
                        Forms\Components\Textarea::make('alasan')
                            ->label('Alasan Penolakan')
                            ->required(),
                    ])
                    ->action(function (array $data, PengajuanSiswa $record, Tables\Actions\Action $action) {
                        $record->update([
                            'alasan' => $data['alasan'],
                            'status' => 'ditolak',
                        ]);

                        Notification::make()
                            ->title('Pengajuan Ditolak')
                            ->danger()
                            ->body("Pengajuan magang telah ditolak.")
                            ->send();

                        // ✅ Refresh tabel tanpa menyebabkan error GET livewire/update
                        $action->refreshTable();
                    }),

                DeleteAction::make(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->label('Filter Status'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanSiswas::route('/'),
            'create' => Pages\CreatePengajuanSiswa::route('/create'),
            'edit' => Pages\EditPengajuanSiswa::route('/{record}/edit'),
        ];
    }
}
