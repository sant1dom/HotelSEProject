<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Hotel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $hotel = Hotel::find(1);
        $contacts = Contact::all();
        view()->share(compact(['hotel', 'contacts']));
    }
}
