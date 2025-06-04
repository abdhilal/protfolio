<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectFeature;

class ProjectFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method can be used to return a view for creating a new project feature
        // For example, you might return a view with a form to create a new feature
        return view('portfolio.crate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectFeature $ProjectFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectFeature $ProjectFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Project $project)
    {
        $request->validate([
            'features' => 'required|array|min:1',
            'features.*' => 'nullable|string|max:255', // features.* validates each item in the array
        ]);

        // Delete existing features for this project
        $project->features()->delete();

        // Create new features based on the submitted array
        foreach ($request->features as $featureName) {
            if ($featureName) { // Only save if the input is not empty
                $project->features()->create([
                    'key_features' => $featureName, // The column name is 'key_features'
                ]);
            }
        }

                return redirect()->route('project.edit', $project->id)
                         ->with('success', 'Project features updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectFeature $ProjectFeature)
    {
        //
    }
}
