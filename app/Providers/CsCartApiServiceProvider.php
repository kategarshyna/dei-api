<?php

namespace App\Providers;

use App\Models\CsCartApi\Client;
use Illuminate\Support\ServiceProvider;

class CsCartApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Client::class, function () {
            $client = new Client([
                'domain' => config('services.cs_cart.base_api_url'),
            ]);
            $client->request->setHeader(
                'Authorization',
                'Basic ' . base64_encode(
                    config('services.cs_cart.username') . ':' . config('services.cs_cart.pass')
                )
            );

            return $client;
        });
    }
}
