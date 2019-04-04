<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\OrderCollection;
use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Models\Order;
use App\Models\CsCartApi\Models\Product;
use BaseApiClient\Endpoint;

class OrdersEndpoint extends Endpoint
{
    public function index(array $params = [])
    {
        $response = $this->request->get('orders', $params);

        return new OrderCollection($response->orders, Order::class);
    }

    public function ordersByUserId($id)
    {
        $response = $this->request->get(sprintf('/orders?user_id=%s', $id));

        return new OrderCollection($response->orders, Order::class);
    }

    public function create(array $params)
    {
        $response = $this->request->post('/orders', $params);

        return new Order($response);
    }

    public function update($id, array $params)
    {
        $response = $this->request->put(sprintf('/orders/%s', $id), $params);

        return new Order($response);
    }

    public function delete($id)
    {
        $response = $this->request->delete(sprintf('products/%s', $id));

        return $response->getResponseCode() === 200;
    }

    public function show($id)
    {
        $response = $this->request->get('products/' . $id);

        return new Product($response->getRaw());
    }
}
