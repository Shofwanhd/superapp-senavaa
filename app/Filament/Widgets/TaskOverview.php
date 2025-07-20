<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Taskuser;
use App\Models\Dailytask;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TaskOverview extends BaseWidget
{   protected ?string $heading = 'Daily Task';
        public static function canView(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, [1, 3]);
    }

    protected function getStats(): array
    {
        
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        $startOfThisMonth = Carbon::now()->startOfMonth();
        $endOfThisMonth = Carbon::now()->endOfMonth();

        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek(); 
        $startOfThisWeek = Carbon::now()->startOfWeek();
        $endOfThisWeek = Carbon::now()->endOfWeek(); 

        $totaldailytaskcurr = Dailytask::where('user_id', Auth::id())->count();
        $totaldailytaskprev = Dailytask::where('user_id', Auth::id())->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $totaldailytaskthis = Dailytask::where('user_id', Auth::id())->whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count();
        $diffTask = $totaldailytaskthis - $totaldailytaskprev;
        $isTaskIncrease = $diffTask >= 0;

        $totaldailytaskWcurr = Dailytask::where('user_id', Auth::id())->whereBetween('created_at', [$startOfThisWeek, $endOfThisWeek])->count();
        $totaldailytaskWprev = Dailytask::where('user_id', Auth::id())->whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])->count();
        $diffTaskW = $totaldailytaskWcurr - $totaldailytaskWprev;
        $isTaskIncreaseW = $diffTaskW >= 0;

        $totallistusercurr = Taskuser::where('user_id', Auth::id())->count();
        $totallistuserprev = Taskuser::where('user_id', Auth::id())->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $diffListuser = $totallistusercurr - $totallistuserprev;
        $isListuserIncrease = $diffListuser >= 0;

        return [
            Stat::make('Total Task Bulan Ini', $totaldailytaskthis)
            ->description(($isTaskIncrease ? '+' : '') . "{$diffTask} " . ($isTaskIncrease ? ' increase' : ' decrease'))
            ->descriptionIcon($isTaskIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isTaskIncrease ? 'success' : 'danger'),

            Stat::make('Total Task Minggu Ini', $totaldailytaskWcurr)
            ->description(($isTaskIncreaseW ? '+' : '') . "{$diffTaskW} " . ($isTaskIncreaseW ? ' increase' : ' decrease'))
            ->descriptionIcon($isTaskIncreaseW ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isTaskIncreaseW ? 'success' : 'danger'),

            Stat::make('List User Daily task', $totallistusercurr)
            ->description(($isListuserIncrease ? '+' : '') . "{$diffListuser} " . ($isListuserIncrease ? ' increase' : ' decrease'))
            ->descriptionIcon($isListuserIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isListuserIncrease ? 'success' : 'danger'),
        ];
    }
}
