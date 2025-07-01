<?php

namespace App\Filament\Resources\UserroleResource\Pages;

use App\Filament\Resources\UserroleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserrole extends CreateRecord
{
    protected static string $resource = UserroleResource::class;

        protected function getRedirectUrl(): string
    {
        // Redirect ke halaman list transaksi setelah berhasil create
        return UserroleResource::getUrl('index');

        // Atau jika kamu ingin redirect ke route lain:
        // return route('posts.list');
    }
}
