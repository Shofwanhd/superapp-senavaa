<?php

namespace App\Providers;

use App\Models\Clientlist;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Dailytask;
use App\Models\Taskuser;
use App\Models\Transaksi;
use App\Models\User;
use App\Policies\DailyTaskPolicy;
use App\Models\Userrole;
use App\Policies\ClientListPolicy;
use App\Policies\TaskUserPolicy;
use App\Policies\TransaksiPolicy;
use App\Policies\UserPolicy;
use App\Policies\UserRolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Dailytask::class => DailyTaskPolicy::class,
        Userrole::class => UserRolePolicy::class,
        User::class => UserPolicy::class,
        Transaksi::class => TransaksiPolicy::class,
        Clientlist::class => ClientListPolicy::class,
        Taskuser::class => TaskUserPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}

