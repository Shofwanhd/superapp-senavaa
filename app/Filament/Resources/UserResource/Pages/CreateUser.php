<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

        protected function getRedirectUrl(): string
    {
        // Redirect ke halaman list transaksi setelah berhasil create
        return UserResource::getUrl('index');

        // Atau jika kamu ingin redirect ke route lain:
        // return route('posts.list');
    }
}
