<?php

namespace App\Filament\Resources\DailyTaskResource\Pages;

use Filament\Actions;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\DailyTaskResource;

class CreateDailyTask extends CreateRecord
{
    protected static string $resource = DailyTaskResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman list transaksi setelah berhasil create
        return DailyTaskResource::getUrl('index');

        // Atau jika kamu ingin redirect ke route lain:
        // return route('posts.list');

    }
}
