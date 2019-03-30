<?php

namespace App\Http\Controllers\API;

use App\Models\CsCartApi\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index(Client $client)
    {
        $user = Auth::user();
        $products = $client->productsEndpoint->index();

        return ['success' => [$products, $user]];
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
