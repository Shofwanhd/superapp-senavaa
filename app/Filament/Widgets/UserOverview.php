<?php

namespace App\Filament\Widgets;
use App\Models\User;
use App\Models\Userrole;
use App\Models\Clientlist;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverview extends BaseWidget
{
    protected ?string $heading = 'Administrator';

    public static function canView(): bool
    {
        return Auth::check() && Auth::user()->role == 4;
    }

    protected function getStats(): array
    {
        $totalusercurrent = User::count();
        $totaluserprev = User::whereDate('created_at', '<', now()->subDays(30))->count();
        $diffuser = $totalusercurrent - $totaluserprev;
        //$percentageuser = $totaluserprev > 0 ? number_format(($diffuser / $totaluserprev) * 100, 1) : 0;
        $isUserIncreaseUser = $diffuser >= 0;

        $totallistclientcurrent = Clientlist::count();
        $totallistclientprev = User::whereDate('created_at', '<', now()->subDays(30))->count();
        $diffclient = $totallistclientcurrent - $totallistclientprev;
        $isUserIncreaseClient = $diffclient >= 0;
        
        $totaluserrolecurrent = Userrole::count();
        $totaluserroleprev = Userrole::whereDate('created_at', '<', now()->subDays(30))->count();
        $diffrole = $totaluserrolecurrent - $totaluserroleprev;
        $isUserIncreaseRole = $diffrole >= 0;

        return [
        Stat::make('Total User', $totalusercurrent)
            ->description(($isUserIncreaseUser ? '+' : '') . "{$diffuser} " . ($isUserIncreaseUser ? 'increase' : 'decrease'))
            ->descriptionIcon($isUserIncreaseUser ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isUserIncreaseUser ? 'success' : 'danger'),

        Stat::make('Total List Client', $totallistclientcurrent)
            ->description(($isUserIncreaseClient ? '+' : '') . "{$diffclient} " . ($isUserIncreaseClient ? 'increase' : 'decrease'))
            ->descriptionIcon($isUserIncreaseClient ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isUserIncreaseClient ? 'success' : 'danger'),

        Stat::make('Total user Role', $totaluserrolecurrent)
            ->description(($isUserIncreaseRole ? '+' : '') . "{$diffrole} " . ($isUserIncreaseRole ? 'increase' : 'decrease'))
            ->descriptionIcon($isUserIncreaseRole ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($isUserIncreaseRole ? 'success' : 'danger'),
        ];
    }
}
