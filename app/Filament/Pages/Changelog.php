<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;

class Changelog extends Page
{

    protected static ?string $navigationGroup = 'Info Aplikasi';
    protected static ?int $navigationSort = 99;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationLabel(): string
    {
        return 'Informasi & Changelog';
    }

        public static function getModelLabel(): string
    {
        return 'Informasi & Changelog';
    }

    protected static string $view = 'filament.pages.changelog';

}