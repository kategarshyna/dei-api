<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\CategoryCollection;
use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Collections\StoreCollection;
use App\Models\CsCartApi\Models\Category;
use App\Models\CsCartApi\Models\Product;
use App\Models\CsCartApi\Models\Store;
use BaseApiClient\Endpoint;

class StoreEndpoint extends Endpoint
{
    public function index(array $params = [])
    {
        $response = $this->request->get('stores', $params);

        return new StoreCollection($response->stores, Store::class);
    }

    public function create(array $params)
    {
        $response = $this->request->post('products', $params);

        return new Product($response);
    }

    public function delete($id)
    {
        $response = $this->request->delete(sprintf('products/%s', $id));

        return $response->getResponseCode() === 200;
    }

    public function show($id)
    {
        $response = $this->request->get('stores/' . $id);

        return new Store($response->getRaw());
    }
}
