<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $results = Project::with('type', 'technologies')->paginate(20);

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }

    public function show(Project $project)
    {
        // $post = Post::with('category','tags')->where('slug',$slug)->first();
        $project->load('type', 'technologies');

        return response()->json([
            'project' => $project
        ]);
    }
}
