<?php

namespace App\Http\Controllers;

use App\Http\Requests\Metal\MetalStoreRequest;
use App\Http\Resources\Metal\MetalResource;
use App\Models\Product;
use Illuminate\Http\Request;

class MetalController extends Controller
{
    public function index()
    {
        $metals = Product::all();
        return MetalResource::collection($metals);
    }

    public function store(MetalStoreRequest $request)
    {
        $data = $request->validated();
        Product::create($data);
    }
    public function show(Product $product)
    {
        return new MetalResource($product);
    }
}
