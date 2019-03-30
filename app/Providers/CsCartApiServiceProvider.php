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
                'domain' => 'https://dei.appreneurs.co/api/',
            ]);
            $client->request->setHeader('Authorization', 'Basic ' . base64_encode("kategarshyna@gmail.com:4UHO1x0Le8zTm00B4b6yr3f27Hr3LFa3"));

            return $client;
        });
    }
}
