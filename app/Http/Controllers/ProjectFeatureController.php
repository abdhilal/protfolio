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
}
