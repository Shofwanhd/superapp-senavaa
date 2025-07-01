<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\LoginCustom;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Responses\Auth\LoginResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Filament\Navigation\MenuItem;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;

class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('dashboard')
            ->path('dashboard')
            ->login(action: LoginCustom::class)

            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                //Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->favicon(asset('images/192x192.png'))

            ->databaseNotifications()

            ->plugins([
                FilamentEditProfilePlugin::make()
                ->slug('my-profile')
                ->setTitle(false)
                ->setNavigationLabel(false)
                ->setNavigationGroup('Profile')
                ->setIcon('heroicon-o-user')
                ->shouldShowAvatarForm(
                    value: true,
                    directory: 'avatars', // image will be stored in 'storage/app/public/avatars
                    rules: 'mimes:jpeg,jpg,png,webp|max:1024' //only accept jpeg and png files with a maximum size of 1MB
                )
                //->hidden()
            ])
            
            ->userMenuItems([
             MenuItem::make()
                ->label('Settings')
                ->url(fn (): string => EditProfilePage::getUrl())
                ->icon('heroicon-m-user-circle'),
            ]);
    }
 	 public function boot(): void
	{
    	Filament::registerRenderHook(
        'head.start',
        fn (): string => <<<HTML
            <link rel="manifest" href="/manifest.json">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="default">
            <link rel="apple-touch-icon" href="/icons/icon-192.png">
        HTML
    	);
	}
}
