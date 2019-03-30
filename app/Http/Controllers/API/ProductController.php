<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ProductsRequest;
use App\Models\CsCartApi\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index(Client $client, ProductsRequest $request)
    {
        $products = $client->productsEndpoint->index($request->all());

        return $products;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client, $id)
    {
        $product = $client->productsEndpoint->show($id);

        return $product;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
