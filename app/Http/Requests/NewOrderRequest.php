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
            'user_data'                                                => 'json',
            'user_data.email'                                          => 'required|email',
            'user_data.b_firstname'                                    => 'required|string',
            'user_data.b_lastname'                                     => 'required|string',
            'user_data.b_address'                                      => 'required|string',
            'user_data.b_city'                                         => 'required|string',
            'user_data.b_state'                                        => 'required|string',
            'user_data.b_country'                                      => 'required|string',
            'user_data.b_zipcode'                                      => 'required|string',
            'user_data.b_phone'                                        => 'required|string',
            'user_data.s_firstname'                                    => 'required|string',
            'user_data.s_lastname'                                     => 'required|string',
            'user_data.s_address'                                      => 'required|string',
            'user_data.s_city'                                         => 'required|string',
            'user_data.s_state'                                        => 'required|string',
            'user_data.s_country'                                      => 'required|string',
            'user_data.s_zipcode'                                      => 'required|string',
            'user_data.s_phone'                                        => 'required|string',
            'shipping_id'                                              => 'required|email',
            'payment_id'                                               => 'required|string',
            'products'                                                 => 'required|json',
            'products.product_id.product_id'                           => 'required|integer',
            'products.product_id.amount'                               => 'required|integer',
            'products.product_id.product_options.option_id'            => 'required|integer',
            'products.product_id.product_options.option_id.variant_id' => 'required|integer',
        ];
    }
}
