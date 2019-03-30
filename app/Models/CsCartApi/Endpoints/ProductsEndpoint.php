<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Models\Product;
use BaseApiClient\Endpoint;

class ProductsEndpoint extends Endpoint
{
    public function index(array $params = [])
    {
        $response = $this->request->get('products', $params);

        return new ProductCollection($response->products, Product::class);
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
}
