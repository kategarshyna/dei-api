<?php

namespace App\Models\CsCartApi\Endpoints;

use App\Models\CsCartApi\Collections\OrderCollection;
use App\Models\CsCartApi\Collections\ProductCollection;
use App\Models\CsCartApi\Models\Cart;
use App\Models\CsCartApi\Models\Order;
use App\Models\CsCartApi\Models\Product;
use BaseApiClient\Endpoint;

class CartsEndpoint extends Endpoint
{
    public function show($id)
    {
        $carts = $this->request->get(sprintf('carts/%s', $id));

        return new Cart($carts->getRaw());
    }
}
