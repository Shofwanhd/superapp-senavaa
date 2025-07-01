<?php

namespace App\Filament\Resources\UserroleResource\Pages;

use App\Filament\Resources\UserroleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserrole extends EditRecord
{
    protected static string $resource = UserroleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
