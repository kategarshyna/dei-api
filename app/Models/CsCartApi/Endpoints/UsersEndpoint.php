<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Models\Product;
use App\Models\CsCartApi\Models\User;
use BaseApiClient\Endpoint;

class UsersEndpoint extends Endpoint
{
    public function show($id)
    {
        $response = $this->request->get(sprintf('users/', $id));

        return new User($response->getRaw());
    }

    public function update($id, array $params)
    {
        $response = $this->request->put(sprintf('/users/%s', $id), $params);

        return new \App\User($response);
    }

}
