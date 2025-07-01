<?php

namespace App\Filament\Resources\ClientlistResource\Pages;

use App\Filament\Resources\ClientlistResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClientlist extends CreateRecord
{
    protected static string $resource = ClientlistResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman list transaksi setelah berhasil create
        return ClientlistResource::getUrl('index');

        // Atau jika kamu ingin redirect ke route lain:
        // return route('posts.list');
    }
}
