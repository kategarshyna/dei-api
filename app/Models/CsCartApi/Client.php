<?php

namespace App\Models\CsCartApi;

use App\Models\CsCartApi\Endpoints\CartsEndpoint;
use App\Models\CsCartApi\Endpoints\CategoryEndpoint;
use App\Models\CsCartApi\Endpoints\OrdersEndpoint;
use App\Models\CsCartApi\Endpoints\ProductsEndpoint;
use App\Models\CsCartApi\Endpoints\StoreEndpoint;
use App\Models\CsCartApi\Endpoints\UsersEndpoint;

/**
 * @property ProductsEndpoint $productsEndpoint
 * @property CategoryEndpoint $categoriesEndpoint
 * @property StoreEndpoint $storesEndpoint
 * @property OrdersEndpoint $ordersEndpoint
 * @property CartsEndpoint $cartsEndpoint
 * @property UsersEndpoint $usersEndpoint
 */
class Client extends \BaseApiClient\Client
{
    /**
     * Namespace for the endpoints
     *
     * @var string
     */
    protected $endpointNamespace = 'App\Models\CsCartApi\Endpoints';
}
