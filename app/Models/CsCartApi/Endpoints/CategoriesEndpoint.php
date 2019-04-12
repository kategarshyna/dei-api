<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\CategoryCollection;
use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Models\Category;
use App\Models\CsCartApi\Models\Product;
use BaseApiClient\Endpoint;

class CategoriesEndpoint extends Endpoint
{
    public function index(array $params = [])
    {
        $response = $this->request->get('categories', $params);

        return new CategoryCollection($response->categories, Category::class);
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
        $response = $this->request->get(sprintf('categories/%s', $id));

        return new Category($response->getRaw());
    }
}
