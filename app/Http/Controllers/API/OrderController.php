<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NewOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\CsCartApi\Client;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index(Client $client, OrderRequest $request)
    {
        $orders = $client->ordersEndpoint->index($request->all());

        return $orders;
    }

    public function ordersByUserId(Client $client)
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = $client->ordersEndpoint->ordersByUserId($user->id);

        return $orders;
    }

    public function store(Client $client, NewOrderRequest $request)
    {
        $order = $client->ordersEndpoint->create($request->all());

        return $order;
    }

    public function show(Client $client, $id)
    {
        $product = $client->productsEndpoint->show($id);

        return $product;
    }

    public function update(Client $client, $id, UpdateOrderRequest $request)
    {
        $order = $client->ordersEndpoint->update($id, $request->all());

        return $order;
    }

    public function destroy($id)
    {
        //
    }
}
