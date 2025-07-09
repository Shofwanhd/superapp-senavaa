<?php

namespace App\Filament\Resources\DailyTaskResource\Pages;

use App\Filament\Resources\DailyTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyTask extends EditRecord
{
    protected static string $resource = DailyTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

        protected function getRedirectUrl(): string
    {
        // Redirect ke halaman list transaksi setelah berhasil create
        return DailyTaskResource::getUrl('index');

        // Atau jika kamu ingin redirect ke route lain:
        // return route('posts.list');
    }
}
