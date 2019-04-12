<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  integer $user_id
 * @property  string $user_data
 * @property  integer $shipping_id
 * @property  integer $payment_id
 * @property  string $products
 */
class NewOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id'                                                  => 'integer',
            'user_data.email'                                          => 'email',
            'user_data.b_firstname'                                    => 'string',
            'user_data.b_lastname'                                     => 'string',
            'user_data.b_address'                                      => 'string',
            'user_data.b_city'                                         => 'string',
            'user_data.b_state'                                        => 'string',
            'user_data.b_country'                                      => 'string',
            'user_data.b_zipcode'                                      => 'string',
            'user_data.b_phone'                                        => 'string',
            'user_data.s_firstname'                                    => 'string',
            'user_data.s_lastname'                                     => 'string',
            'user_data.s_address'                                      => 'string',
            'user_data.s_city'                                         => 'string',
            'user_data.s_state'                                        => 'string',
            'user_data.s_country'                                      => 'string',
            'user_data.s_zipcode'                                      => 'string',
            'user_data.s_phone'                                        => 'string',
            'shipping_id'                                              => 'required|integer',
            'payment_id'                                               => 'required|string',
            'products.product_id.product_id'                           => 'required|integer',
            'products.product_id.amount'                               => 'required|integer',
            'products.product_id.product_options.option_id'            => 'required|integer',
            'products.product_id.product_options.variant_id'           => 'required|integer',
        ];
    }
}
