<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Pagination param    Description
 * @property  integer $page
 * @property  integer $items_per_page
 */
class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page'           => 'integer',
            'items_per_page' => 'integer'
        ];
    }
}
