<?php

namespace App\Models\CsCartApi\Models;

use BaseApiClient\Models\Model;

/**
 * @property int $user_id
 */
class User extends Model
{
    public function toArray()
    {
//        return [
//            'id' => $this->product_id,
//            'title' => $this->product,
//            'price' => $this->price
//        ];
    }
}
