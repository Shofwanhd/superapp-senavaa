<?php

namespace App\Filament\Resources\UserroleResource\Pages;

use App\Filament\Resources\UserroleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserroles extends ListRecords
{
    protected static string $resource = UserroleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
