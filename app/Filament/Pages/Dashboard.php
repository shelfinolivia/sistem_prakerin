<?php
namespace App\Filament\Pages;

use Filament\Pages\Page as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $title = 'Dashboard';
    protected static string $view = 'filament.pages.dashboard';
}
