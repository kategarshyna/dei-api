<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Pagination param    Description
 * @property  integer $page
 * @property  integer $items_per_page
 * @property  string $sort_by
 * @property  string $sort_order
 * @property  integer $timestamp
 * @property  string $company
 */
class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page'           => 'integer',
            'items_per_page' => 'integer',
            'sort_by'        => 'string',
            'sort_order'     => 'in:asc,desc',
            'timestamp'      => 'integer',
            'company'        => 'string'
        ];
    }
}
