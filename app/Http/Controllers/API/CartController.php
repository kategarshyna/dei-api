<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NewOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\CsCartApi\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function show(Client $client, $id)
    {
        $cart = $client->cartsEndpoint->show($id);

        return $cart;
    }
}
