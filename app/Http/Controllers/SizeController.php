<?php

namespace App\Http\Controllers;

use App\Http\Requests\Size\SizeStoreRequest;
use App\Models\Size;

class SizeController extends Controller
{
    public function store(SizeStoreRequest $request)
    {
        $data = $request->validated();
        Size::create($data);
    }
}
