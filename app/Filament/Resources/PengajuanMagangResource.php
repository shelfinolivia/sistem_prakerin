<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanMagangResource\Pages;
use App\Models\PengajuanMagang;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class PengajuanMagangResource extends Resource
{
    /** 🛠️ Menentukan Model untuk Resource */
    public static ?string $model = PengajuanMagang::class;

    /** 🔗 Menentukan ikon & label pada Sidebar */
    protected static ?string $navigationGroup = 'Manajemen Magang';

    protected static ?string $navigationLabel = 'Pengajuan Magang';
    
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    

    /** 📌 Form untuk Tambah & Edit Data */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('perusahaan')
                    ->required()
                    ->label('Nama Perusahaan')
                    ->maxLength(255),

                TextInput::make('posisi')
                    ->required()
                    ->label('Posisi Magang')
                    ->maxLength(255),

                DatePicker::make('tanggal_mulai')
                    ->required()
                    ->label('Tanggal Mulai')
                    ->minDate(now()),

                DatePicker::make('tanggal_selesai')
                    ->required()
                    ->label('Tanggal Selesai')
                    ->after('tanggal_mulai'),

                Textarea::make('alasan')
                    ->required()
                    ->label('Alasan Pengajuan')
                    ->maxLength(500),

                Select::make('status')
                    ->label('Status Pengajuan')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('pending')
                    ->disabled(fn () => Filament::auth()->user()?->role !== 'admin'), // ❌ Menghindari error saat user null
            ]);
    }

    /** 📌 Table untuk Menampilkan Data */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('perusahaan')
                    ->label('Perusahaan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('posisi')
                    ->label('Posisi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tanggal_mulai')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),

                TextColumn::make('tanggal_selesai')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                        default => 'Unknown',
                    })
                    ->color(fn ($state) => match ($state) {
                        'pending' => 'warning',
                        'diterima' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    }),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->actions([
                EditAction::make()->label('Edit'),
                DeleteAction::make()->label('Hapus'),
            ]);
    }

    /** 📌 Relasi (jika ada) */
    public static function getRelations(): array
    {
        return [];
    }

    /** 📌 Menentukan Routing Halaman */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanMagang::route('/'),
            'create' => Pages\CreatePengajuanMagang::route('/create'),
            'edit' => Pages\EditPengajuanMagang::route('/{record}/edit'),
        ];
    }
}
