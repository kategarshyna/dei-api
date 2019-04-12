<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Collections\UserCollection;
use App\Models\CsCartApi\Models\Product;
use App\Models\CsCartApi\Models\CsCartUser;
use BaseApiClient\Endpoint;

class UsersEndpoint extends Endpoint
{
    public function show($id)
    {
        $response = $this->request->get(sprintf('users/%s', $id));

        return new CsCartUser($response->getRaw());
    }

    public function update($id, array $params)
    {
        $response = $this->request->put(sprintf('/users/%s', $id), $params);

        return new CsCartUser($response->getRaw());
    }

    public function auth(array $params)
    {
        $response = $this->request->post('directLogin', $params);

        return new CsCartUser($response->getRaw());
    }

    public function create(array $params)
    {
        $response = $this->request->post('users', $params);

        return new CsCartUser($response->getRaw());
    }

}
