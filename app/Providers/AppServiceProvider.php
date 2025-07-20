<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;

use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Authenticatable::class, User::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    if (
        app()->environment('production') &&
        request()->header('X-Forwarded-Proto') === 'https'
    ) {
        URL::forceScheme('https');
    }

            FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_START,
            fn () => <<<HTML
            <link rel="manifest" href="/manifest.json">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="default">
            <link rel="apple-touch-icon" href="/icons/180x180.png">
            <script>
                if ('serviceWorker' in navigator) {
                    window.addEventListener('load', () => {
                        navigator.serviceWorker.register('/service-worker.js')
                            .then(reg => console.log('SW registered:', reg))
                            .catch(err => console.error('SW registration failed:', err));
                    });
                }
            </script>
        HTML
    );

    }
}
