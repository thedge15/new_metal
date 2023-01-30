<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStandard\ProductStandardRequest;
use App\Models\ProductStandard;

class ProductStandardController extends Controller
{
    public function store(ProductStandardRequest $request)
    {
        $data = $request->validated();
        ProductStandard::create($data);
    }
}
