<?php

namespace App\Filament\Resources\ClientlistResource\Pages;

use App\Filament\Resources\ClientlistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientlist extends EditRecord
{
    protected static string $resource = ClientlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
