<?php

namespace App\Filament\Resources\TaskUserResource\Pages;

use App\Filament\Resources\TaskUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskUser extends EditRecord
{
    protected static string $resource = TaskUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

                protected function getRedirectUrl(): string
    {
        // Redirect ke halaman list transaksi setelah berhasil create
        return TaskUserResource::getUrl('index');

        // Atau jika kamu ingin redirect ke route lain:
        // return route('posts.list');
    }
}
