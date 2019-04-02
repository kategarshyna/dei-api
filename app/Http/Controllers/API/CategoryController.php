<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CategoryRequest;
use App\Models\CsCartApi\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(Client $client, CategoryRequest $request)
    {
        $categories = $client->categoriesEndpoint->index($request->all());

        return $categories;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client, $id)
    {
        $category = $client->categoriesEndpoint->show($id);

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
