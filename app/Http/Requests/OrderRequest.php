<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * @property  integer $user_id Searches only for the orders placed the customer with the specified ID.
 * @property  integer $company_id Searches only for the orders placed on the specific storefront (in CS-Cart) or at the specific vendor (in Multi-Vendor).
 * @property  string $email Searches only for the orders placed by the customer with the specified email.
 * @property  integer $invoice_id Searches only for the orders with the specified invoice ID.
 * @property  integer $credit_memo_id Searches only for the orders with the specified credit memo ID.
 * @property  string $status Product status (P—processed C—complete O—open F—failed D—declined B—backordered I—cancelled Y—awaiting call)
 *
 * Sorting param    Description
 * @property  string $sort_by Determines the parameter by which the orders are sorted in the response.
 * @property  string $sort_order Determines the sorting order:asc—ascending desc—descending
 *
 * Pagination param    Description
 * @property  integer $page Shows products on a page with the defined number
 * @property  integer $items_per_page Shows N products, where N - is a number defined in the parameter
 */
class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id'        => 'integer',
            'company_id'     => 'integer',
            'email'          => 'string|email',
            'invoice_id'     => 'integer',
            'credit_memo_id' => 'integer',
            'status'         => 'string|in:P,C,O,F,D,B,I,Y',
            'sort_order'     => 'string|in:asc,desc',
            'sort_by'        => 'string|in:status,list_price,product,price,code,amount',
            'page'           => 'integer',
            'items_per_page' => 'integer'
        ];
    }
}
