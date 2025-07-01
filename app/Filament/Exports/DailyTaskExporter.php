<?php

namespace App\Filament\Exports;

use App\Models\DailyTask;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;

class DailyTaskExporter extends Exporter
{
    protected static ?string $model = DailyTask::class;

    public function getXlsxCellStyle(): ?Style
{
    return (new Style())
        ->setFontSize(11)
        ->setFontName('Gill Sans MT')
        ->setCellAlignment(CellAlignment::CENTER)
        ->setCellVerticalAlignment(CellVerticalAlignment::CENTER);
}

    public static function getColumns(): array
    {
        return [
           // ExportColumn::make('id')
            //    ->label('ID'),
            //ExportColumn::make('user_id'),
            ExportColumn::make('tanggal')
            ->label('Tanggal')
                ->formatStateUsing(function ($state) {
                    return \Carbon\Carbon::parse($state)->format('d-M-Y');
                }),
            ExportColumn::make('category'),
            ExportColumn::make('activities'),
            ExportColumn::make('result'),
            ExportColumn::make('target_plan'),
            ExportColumn::make('problem'),
            ExportColumn::make('office')->formatStateUsing(fn ($record) => $record->PIC 
            ? "{$record->office} ( {$record->PIC} )" 
            : $record->office),
            //ExportColumn::make('PIC'),
            //ExportColumn::make('created_at'),
            //ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your daily task export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
