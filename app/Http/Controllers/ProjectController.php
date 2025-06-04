<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectTechnology;
use App\Models\ProjectLink;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image; // استيراد واجهة Image

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Example: Fetch all projects to display on a listing page
        $projects = Project::with(['features', 'technologies', 'links', 'images'])->get();
        return view('portfolio.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'problem_solved' => 'required|string',
            'my_Role' => 'required|string|max:255',
            'link_video' => 'nullable|url|max:255',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB

            'technologies' => 'required|array',
            'technologies.*' => 'required|string|max:255',

            'key_features' => 'required|array',
            'key_features.*' => 'required|string',

            'link_name' => 'nullable|array',
            'link_name.*' => 'nullable|string|max:255',
            'project_links' => 'nullable|array',
            'project_links.*' => 'nullable|url|max:255',
            // Custom validation to ensure link_name and project_links arrays have matching sizes
            'link_name' => [
                'nullable',
                'array',
                Rule::requiredIf(fn () => !empty($request->input('project_links'))),
            ],
            'project_links' => [
                'nullable',
                'array',
                Rule::requiredIf(fn () => !empty($request->input('link_name'))),
            ],
            function ($attribute, $value, $fail) use ($request) {
                if (!empty($request->input('link_name')) && !empty($request->input('project_links')) && count($request->input('link_name')) !== count($request->input('project_links'))) {
                    $fail('The link names and project links must have the same number of entries.');
                }
            },

            'images_gallery' => 'nullable|array',
            'images_gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Each image max 2MB
        ]);

        // 2. Start a Database Transaction
        DB::beginTransaction();

        try {
            // 3. Handle image_cover upload with compression
            $imageCoverPath = null;
            if ($request->hasFile('image_cover')) {
                $image = $request->file('image_cover');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = 'public/projects/covers/' . $filename;

                // ضغط الصورة (مثال: جودة 80%)
                $img = Image::make($image)->encode($image->getClientOriginalExtension(), 80); // ضغط بجودة 80%
                Storage::put($path, $img->stream()); // حفظ الصورة المضغوطة

                $imageCoverPath = Storage::url($path); // الحصول على المسار العام
            }

            // 4. Create the main Project record
            $project = Project::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'overview' => $validatedData['overview'],
                'problem_solved' => $validatedData['problem_solved'],
                'my_Role' => $validatedData['my_Role'],
                'link_video' => $validatedData['link_video'],
                'image_cover' => $imageCoverPath,
            ]);

            // 5. Save Project Technologies
            if (isset($validatedData['technologies'])) {
                foreach ($validatedData['technologies'] as $technologyName) {
                    if (!empty($technologyName)) {
                        $project->technologies()->create([
                            'technologies' => $technologyName,
                        ]);
                    }
                }
            }

            // 6. Save Project Features
            if (isset($validatedData['key_features'])) {
                foreach ($validatedData['key_features'] as $featureText) {
                    if (!empty($featureText)) {
                        $project->features()->create([
                            'key_features' => $featureText,
                        ]);
                    }
                }
            }

            // 7. Save Project Links
            if (isset($validatedData['link_name']) && isset($validatedData['project_links'])) {
                foreach ($validatedData['link_name'] as $index => $linkName) {
                    $linkUrl = $validatedData['project_links'][$index] ?? null;
                    if (!empty($linkName) && !empty($linkUrl)) {
                        $project->links()->create([
                            'link_name' => $linkName,
                            'project_links' => $linkUrl,
                        ]);
                    }
                }
            }

            // 8. Handle images_gallery upload and save Project Images with compression
            if ($request->hasFile('images_gallery')) {
                foreach ($request->file('images_gallery') as $galleryImage) {
                    if ($galleryImage->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $galleryImage->getClientOriginalExtension(); // اسم فريد
                        $path = 'public/projects/gallery/' . $filename;

                        // ضغط الصورة (مثال: جودة 80%)
                        $img = Image::make($galleryImage)->encode($galleryImage->getClientOriginalExtension(), 80); // ضغط بجودة 80%
                        Storage::put($path, $img->stream()); // حفظ الصورة المضغوطة

                        $imagePublicUrl = Storage::url($path);
                        $project->images()->create([
                            'images_gallery' => $imagePublicUrl,
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('portfolio.index')->with('success', 'Project created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['features', 'technologies', 'links', 'images']);
        return view('portfolio.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load(['features', 'technologies', 'links', 'images']);
        return view('portfolio.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // (Similar logic to store, but handle existing data and updates)
        // You would need to add validation here as well
        // Handle file updates (delete old, upload new)
        // Sync relationships (e.g., $project->technologies()->sync(), or delete/create)
        // For simplicity, not fully implemented here but follows similar patterns to store
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            // Delete associated files from storage
            if ($project->image_cover) {
                Storage::delete(str_replace('/storage', 'public', $project->image_cover));
            }
            foreach ($project->images as $image) {
                Storage::delete(str_replace('/storage', 'public', $image->images_gallery));
            }

            $project->delete();
            DB::commit();
            return redirect()->route('portfolio.index')->with('success', 'Project deleted successfully!');
        } catch (\Exception | \Throwable $e) { // Catch Throwable to also catch fatal errors
            DB::rollBack();

        }
    }
}
