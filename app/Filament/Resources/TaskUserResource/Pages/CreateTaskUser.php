<?php

namespace App\Filament\Resources\TaskUserResource\Pages;

use App\Filament\Resources\TaskUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskUser extends CreateRecord
{
    protected static string $resource = TaskUserResource::class;
}
