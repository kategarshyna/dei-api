<?php

namespace App\Models\CsCartApi;

use App\Models\CsCartApi\Endpoints\ProductsEndpoint;

/**
 * @property ProductsEndpoint $productsEndpoint
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
