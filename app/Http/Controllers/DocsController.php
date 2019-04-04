<?php

namespace App\Http\Controllers;

use Mtrajano\LaravelSwagger\Generator;

class DocsController extends Controller
{
    public function index()
    {
        return view('docs.index');
    }

    public function json()
    {
        $config = config('laravel-swagger');

        $docs = (new Generator($config, '/api'))->generate();

        $docs['securitySchemes'] = [
            'ApiKeyAuth' => [
                'type' => 'apiKey',
                "in"   => "header",
                "name" => "Authorization"
            ]
        ];

        $docs["security"] = [
            [
                "ApiKeyAuth" => []
            ]
        ];

        return response()->json($docs);
    }
}
