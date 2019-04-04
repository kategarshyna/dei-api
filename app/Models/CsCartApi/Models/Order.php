<?php

namespace App\Models\CsCartApi\Models;

use BaseApiClient\Models\Model;

/**
 * @property int $order_id
 * @property int $user_id
 * @property string $email
 */
class Order extends Model
{
    public function toArray()
    {
        return [
            'id' => $this->order_id,
            'title' => $this->user_id,
            'price' => $this->email
        ];
    }
}
