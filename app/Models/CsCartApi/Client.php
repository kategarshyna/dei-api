<?php

namespace App\Models\CsCartApi;

use App\Models\CsCartApi\Endpoints\CategoryEndpoint;
use App\Models\CsCartApi\Endpoints\ProductsEndpoint;
use App\Models\CsCartApi\Endpoints\StoreEndpoint;

/**
 * @property ProductsEndpoint $productsEndpoint
 * @property CategoryEndpoint $categoriesEndpoint
 * @property StoreEndpoint $storesEndpoint
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
