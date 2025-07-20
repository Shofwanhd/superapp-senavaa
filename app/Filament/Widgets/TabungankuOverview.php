<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TabungankuOverview extends BaseWidget
{ protected ?string $heading = 'Tabunganku';
        public static function canView(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, [2, 3]);
    }
    
    protected function getStats(): array
    {

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        $startOfThisMonth = Carbon::now()->startOfMonth();
        $endOfThisMonth = Carbon::now()->endOfMonth();

        $TotalPemasukanCurr = Transaksi::where('kategori', 'Pemasukan')->sum('nominal');
        $TotalPemasukanPrev = Transaksi::where('kategori', 'Pemasukan')->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('nominal');
        $TotalPemasukanCurrs = Transaksi::where('kategori', 'Pemasukan')->whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->sum('nominal');
        $diffPemasukan = $TotalPemasukanCurrs - $TotalPemasukanPrev;
        $isPemasukanIncrease = $diffPemasukan >= 0;

        $TotalPengeluaranCurr = Transaksi::where('kategori', 'Pengeluaran')->sum('nominal');
        $TotalPengeluaranPrev = Transaksi::where('kategori', 'Pengeluaran')->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('nominal');
        $TotalPengeluaranCurrs = Transaksi::where('kategori', 'Pengeluaran')->whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->sum('nominal');
        $diffPengeluaran = $TotalPengeluaranCurrs - $TotalPengeluaranPrev;
        $isPengeluaranIncrease = $diffPengeluaran >= 0;

        $TotalTabunganCurr = $TotalPemasukanCurr - $TotalPengeluaranCurr;
        $TotalTabunganPrev = Transaksi::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('nominal');
        $diffTabungan = $TotalTabunganCurr - $TotalTabunganPrev;
        $isTabunganIncrease = $diffTabungan >= 0;
        

        return [

            Stat::make('Total Pemasukan Bulan ini', 'Rp ' . number_format($TotalPemasukanCurrs))
            ->description(($isPemasukanIncrease ? '+ Rp ' : '') . number_format("{$diffPemasukan} ") . ($isPemasukanIncrease ? ' increase' : ' decrease'))
            ->descriptionIcon($isPemasukanIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isPemasukanIncrease ? 'success' : 'danger'),

            Stat::make('Total Pengeluaran Bulan ini', 'Rp ' . number_format($TotalPengeluaranCurrs))
            ->description(($isPengeluaranIncrease ? '+ Rp ' : '') . number_format("{$diffPengeluaran} ") . ($isPengeluaranIncrease ? ' increase' : ' decrease'))
            ->descriptionIcon($isPengeluaranIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isPengeluaranIncrease ? 'danger' : 'success'),

            Stat::make('Total Tabungan', 'Rp ' . number_format($TotalTabunganCurr))
            ->description(($isTabunganIncrease ? '+ Rp ' : '') . number_format("{$diffTabungan} ") . ($isTabunganIncrease ? ' increase' : ' decrease'))
            ->descriptionIcon($isTabunganIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isTabunganIncrease ? 'success' : 'danger'),
        ];
    }
}
