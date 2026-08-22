<?php


namespace App\Providers;

use App\Support\WhatsApp;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TmoViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('whatsappLink', WhatsApp::link('Hi TMO Ultimate, I would like to know more about your services.'));
            $view->with('whatsappDisplay', WhatsApp::displayNumber());
        });

        Paginator::defaultView('vendor.pagination.tmo');
    }
}