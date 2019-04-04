<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  string $pshort Short description
 * @property  string $pfull Full description
 * @property  string $pkeywords Meta keywords
 * @property  string $pcode Product code
 * @property  string $cid Category ID
 * @property  integer $amount_from In stock lower range
 * @property  integer $amount_to In stock higher range
 * @property  integer $price_from Price lower range
 * @property  integer $price_to Price higher range
 * @property  string $subcats Include subcategories of the given category (Y/N)
 * @property  string $order_ids IDs of the orders to search the products in (1,13,24)
 * @property  string $free_shipping Free shipping (Y/N)
 * @property  string $status Product status (A for Active/D for Disabled/H for Hidden)
 *
 * Sorting
 * It is possible to set the sort order by defining the sort_order URL param to asc or desc.
 * @property  string $list_price List price
 * @property  string $product Product name
 * @property  string $price Price
 * @property  string $code Product code
 * @property  string $amount In stock amount
 *
 * Sorting param    Description
 * @property  string $sort_by Determines the parameter by which the products are sorted in the response.
 * @property  string $sort_order Determines the sorting products:asc—ascending desc—descending
 *
 * Pagination param    Description
 * @property  integer $page Shows products on a page with the defined number
 * @property  integer $items_per_page Shows N products, where N - is a number defined in the parameter
 */
class ProductsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pname'          => 'string',
            'pshort'         => 'string',
            'pfull'          => 'string',
            'pkeywords'      => 'string',
            'pcode'          => 'string',
            'cid'            => 'integer',
            'amount_from'    => 'integer',
            'amount_to'      => 'integer',
            'price_from'     => 'integer',
            'price_to'       => 'integer',
            'subcats'        => 'string|in:Y,N',
            'order_ids'      => 'string|in:1,13,24',
            'free_shipping'  => 'string|in:Y,N',
            'status'         => 'string|in:A,D,H',
            'sort_order'     => 'string|in:asc,desc',
            'sort_by'        => 'string|in:status,list_price,product,price,code,amount',
            'page'           => 'integer',
            'items_per_page' => 'integer'
        ];
    }
}
