<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectApiController
{
    /**
     * Get all projects with optional filtering
     */
    public function index(): JsonResponse
    {
        $projects = Project::query()
            ->when(request('featured'), fn($q) => $q->where('featured', true))
            ->when(request('tech'), function($q) {
                $tech = request('tech');
                return $q->whereRaw("technologies LIKE ?", ["%$tech%"]);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return response()->json([
            'success' => true,
            'data' => $projects->items(),
            'pagination' => [
                'current_page' => $projects->currentPage(),
                'total' => $projects->total(),
                'per_page' => $projects->perPage(),
                'last_page' => $projects->lastPage(),
            ]
        ]);
    }

    /**
     * Get single project
     */
    public function show(Project $project): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }

    /**
     * Get projects by technology
     */
    public function byTechnology(string $tech): JsonResponse
    {
        $projects = Project::whereRaw("technologies LIKE ?", ["%$tech%"])
            ->get();

        return response()->json([
            'success' => true,
            'technology' => $tech,
            'count' => $projects->count(),
            'data' => $projects
        ]);
    }

    /**
     * Get featured projects only
     */
    public function featured(): JsonResponse
    {
        $projects = Project::where('featured', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'count' => $projects->count(),
            'data' => $projects
        ]);
    }

    /**
     * Get portfolio statistics
     */
    public function stats(): JsonResponse
    {
        $stats = [
            'total_projects' => Project::count(),
            'featured_projects' => Project::where('featured', true)->count(),
            'technologies' => array_unique(
                array_merge(...Project::pluck('technologies')
                    ->map(fn($t) => array_map('trim', explode(',', $t ?? '')))
                    ->toArray())
            ),
        ];

        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }
}
