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
        $totaldailytaskcurr = Dailytask::where('user_id', Auth::id())->count();
        $totaldailytaskprev = Dailytask::where('user_id', Auth::id())->whereDate('created_at', '<', now()->subDays(30))->count();
        $diffTask = $totaldailytaskcurr - $totaldailytaskprev;
        $isTaskIncrease = $diffTask >= 0;

        $totaldailytaskWcurr = Dailytask::where('user_id', Auth::id())->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $totaldailytaskWprev = Dailytask::where('user_id', Auth::id())->whereDate('created_at', '<', now()->subDays(7))->count();
        $diffTaskW = $totaldailytaskWcurr - $totaldailytaskWprev;
        $isTaskIncreaseW = $diffTaskW >= 0;

        $totallistusercurr = Taskuser::where('user_id', Auth::id())->count();
        $totallistuserprev = Taskuser::where('user_id', Auth::id())->whereDate('created_at', '<', now()->subDays(30))->count();
        $diffListuser = $totallistusercurr - $totallistuserprev;
        $isListuserIncrease = $diffListuser >= 0;

        return [
            Stat::make('Total Task', $totaldailytaskcurr)
            ->description(($isTaskIncrease ? '+' : '') . "{$diffTask} " . ($isTaskIncrease ? 'increase' : 'decrease'))
            ->descriptionIcon($isTaskIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isTaskIncrease ? 'success' : 'danger'),

            Stat::make('Total Task Minggu Ini', $totaldailytaskWcurr)
            ->description(($isTaskIncreaseW ? '+' : '') . "{$diffTaskW} " . ($isTaskIncreaseW ? 'increase' : 'decrease'))
            ->descriptionIcon($isTaskIncreaseW ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isTaskIncreaseW ? 'success' : 'danger'),

            Stat::make('List User Daily task', $totallistusercurr)
            ->description(($isListuserIncrease ? '+' : '') . "{$diffListuser} " . ($isListuserIncrease ? 'increase' : 'decrease'))
            ->descriptionIcon($isListuserIncrease ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isListuserIncrease ? 'success' : 'danger'),
        ];
    }
}
