<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bush\BushStoreRequest;
use App\Http\Resources\Bush\BushResource;
use App\Models\Bush;

class BushController extends Controller
{
    public function index()
    {
        $bushes = Bush::all();
        return BushResource::collection($bushes);
    }

    public function store(BushStoreRequest $request)
    {
        $data = $request->validated();
        Bush::create($data);
    }
}
