<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectTechnology;

class ProjectTechnologyController extends Controller
{

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'technologies' => 'required|array|min:1',
            'technologies.*' => 'nullable|string|max:255', // technologies.* validates each item in the array
        ]);

        // Delete existing technologies for this project
        $project->technologies()->delete();

        // Create new technologies based on the submitted array
        foreach ($request->technologies as $techName) {
            if ($techName) { // Only save if the input is not empty
                $project->technologies()->create([
                    'technologies' => $techName, // The column name is 'technologies'
                ]);
            }
        }

        return redirect()->route('project.edit', $project->id)
                         ->with('success', 'Project technologies updated successfully!');
    }
}
