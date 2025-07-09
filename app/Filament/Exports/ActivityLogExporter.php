<?php

namespace App\Filament\Exports;

use Closure;
use App\Models\ActivityLog;
use Filament\Actions\Exports\Exporter;
use Illuminate\Container\Attributes\Log;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;

class ActivityLogExporter extends Exporter
{
    protected static ?string $model = ActivityLog::class;

    public static function getColumns(): array
    {
        return [
           // ExportColumn::make('id')
           //     ->label('ID'),
           // ExportColumn::make('dailytask_id'),
           // ExportColumn::make('user_id'),
           // ExportColumn::make('isExported'),
           ExportColumn::make('requester'),
           ExportColumn::make('subject'),
           ExportColumn::make('isi'),
           ExportColumn::make('jawaban'),
           ExportColumn::make('noAL')
            ->label('Nomor AL'),
           ExportColumn::make('isAttachS')
            ->label('Attachment'),
           ExportColumn::make('isAttachF')
            ->label('Attachment Jawaban'),
            // ExportColumn::make('created_at'),
            // ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your activity log export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}