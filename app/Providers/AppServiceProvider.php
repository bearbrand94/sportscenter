<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
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
        $client = new Client(['cookies' => true]);
        try {
            $res = $client->request('GET', config('app.api_url')."/initialData");
            if($res->getStatusCode() == 200){ // 200 = Success
                $user_info = json_decode($res->getBody()); // { "type": "User", ..
                view()->share('auth_data', $user_info->data);
            }
        } catch (RequestException $e) {
            $error_data = json_decode($e->getResponse()->getBody()->getContents())->data;
            view()->share('auth_data', $error_data);
        }
        Schema::defaultStringLength(191);
    }
}
