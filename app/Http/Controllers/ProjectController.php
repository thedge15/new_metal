<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Bush;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Bush $bush)
    {
        $projects = $bush->projects()->get();
        return ProjectResource::collection($projects);
    }

    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();
        Project::create($data);
    }
}
