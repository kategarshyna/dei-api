<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StoreRequest;
use App\Models\CsCartApi\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function index(Client $client, StoreRequest $request)
    {
        $categories = $client->storesEndpoint->index($request->all());

        return $categories;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client, $id)
    {
        $category = $client->storesEndpoint->show($id);

        return $category;
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
