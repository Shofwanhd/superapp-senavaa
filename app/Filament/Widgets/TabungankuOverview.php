<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class TabungankuOverview extends BaseWidget
{ protected ?string $heading = 'Tabunganku';
        public static function canView(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, [2, 3]);
    }
    
    protected function getStats(): array
    {

        $TotalPemasukanCurr = Transaksi::where('kategori', 'Pemasukan')->sum('nominal');
        $TotalPemasukanPrev = Transaksi::whereDate('created_at', '<', now()->subDays(30))->sum('nominal');
        $diffPemasukan = $TotalPemasukanCurr - $TotalPemasukanPrev;
        $isPemasukanIncrease = $diffPemasukan >= 0;

        $TotalPengeluaranCurr = Transaksi::where('kategori', 'Pengeluaran')->sum('nominal');
        $TotalPengeluaranPrev = Transaksi::whereDate('created_at', '<', now()->subDays(30))->sum('nominal');
        $diffPengeluaran = $TotalPengeluaranCurr - $TotalPengeluaranPrev;
        $isPengeluaranIncrease = $diffPengeluaran >= 0;

        $TotalTabunganCurr = $TotalPemasukanCurr - $TotalPengeluaranCurr;
        $TotalTabunganPrev = Transaksi::whereDate('created_at', '<', now()->subDays(30))->sum('nominal');
        $diffTabungan = $TotalTabunganCurr - $TotalTabunganPrev;
        $isTabunganIncrease = $diffTabungan >= 0;

        return [

            Stat::make('Total Tabungan', 'Rp ' . number_format($TotalTabunganCurr))
            ->description(($isTabunganIncrease ? '+' : '') . "{$diffTabungan} " . ($isTabunganIncrease ? 'increase' : 'decrease'))
            ->descriptionIcon($isTabunganIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isTabunganIncrease ? 'success' : 'danger'),

            Stat::make('Total Pemasukan', 'Rp ' . number_format($TotalPemasukanCurr))
            ->description(($isPemasukanIncrease ? '+' : '') . "{$diffPemasukan} " . ($isPemasukanIncrease ? 'increase' : 'decrease'))
            ->descriptionIcon($isPemasukanIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isPemasukanIncrease ? 'success' : 'danger'),

            Stat::make('Total Pengeluaran', 'Rp ' . number_format($TotalPengeluaranCurr))
            ->description(($isPengeluaranIncrease ? '+' : '') . "{$diffPengeluaran} " . ($isPengeluaranIncrease ? 'increase' : 'decrease'))
            ->descriptionIcon($isPengeluaranIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isPengeluaranIncrease ? 'danger' : 'success'),
        ];
    }
}
