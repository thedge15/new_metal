<?php

namespace App\Http\Controllers;

use App\Http\Requests\SteelGrade\SteelGradeStoreRequest;
use App\Http\Requests\SteelGrade\SteelStandardStoreRequest;
use App\Http\Resources\SteelGrade\SteelGradeResource;
use App\Models\SteelGrade;
use App\Models\SteelStandard;

class SteelGradeController extends Controller
{
    public function index()
    {
        $steelGrades = SteelGrade::all();
        return SteelGradeResource::collection($steelGrades);
    }

    public function store(SteelGradeStoreRequest $request)
    {
        $data = $request->validated();
        SteelGrade::create($data);
    }

    public function show(SteelGrade $steelGrade)
    {
        return new SteelGradeResource($steelGrade);
    }

    public function standardStore(SteelStandardStoreRequest $request)
    {
        $data = $request->validated();
        SteelStandard::create($data);
    }
}
