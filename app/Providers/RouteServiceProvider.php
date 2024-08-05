<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para o "home" após o login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registre os serviços de roteamento.
     *
     * @return void
     */
    public function boot()
    {
        RateLimiter::for('api',function(Request $request){
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });


        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
