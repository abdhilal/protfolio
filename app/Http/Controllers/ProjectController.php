<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectTechnology;
use App\Models\ProjectLink;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // تم الاحتفاظ بها لأهمية الـ Transaction
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Log; // تم إضافة هذا الاستيراد لتسجيل الأخطاء

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $request->validate([
            'title' => 'required|string|max:255',



        ]);


        // 2. Start a Database Transaction (مهم للحفاظ على اتساق البيانات)

        // 3. Handle image_cover upload with compression
        $imageCoverPath = null;

        if ($request->hasFile('image_cover')) {
            $image = $request->file('image_cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('projects/covers'); // مجلد داخل public مباشرة

            // إنشاء المجلد إذا لم يكن موجودًا
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // قراءة الصورة وضغطها وحفظها
            $img = Image::read($image->getRealPath())->encodeByExtension($image->getClientOriginalExtension(), 80);
            file_put_contents($directory . '/' . $filename, (string) $img);

            // حفظ المسار داخل قاعدة البيانات (وليس الرابط)
            $imageCoverPath = 'projects/covers/' . $filename;
        }



        // 4. Create the main Project record
        $project = Project::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'overview' => $request['overview'],
            'problem_solved' => $request['problem_solved'],
            'my_Role' => $request['my_Role'],
            'link_video' => $request['link_video'],
            'image_cover' => $imageCoverPath,
        ]);
        ProjectLink::create([
            'project_id' => $project->id,

        ]);
        ProjectImage::create([
            'project_id' => $project->id,
        ]);
        ProjectFeature::create([
            'project_id' => $project->id,
        ]);
        ProjectTechnology::create([
            'project_id' => $project->id,
        ]);


        return redirect()->route('portfolio.index')->with('success', 'Project created successfully!');
    }


    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($projectId)
    {
        $project = Project::find($projectId);
        $project->load(['features', 'technologies', 'links', 'images']);
        return view('portfolio.edit', compact('project'));
    }

     public function show($projectId)
    {
        $project = Project::find($projectId);
        $project->load(['features', 'technologies', 'links', 'images']);
        return view('portfolio.project_show', compact('project'));
    }


    /**
     * Update the specified resource in s
     *
     * torage.
     */

    public function update(Request $request, $projectId)
    {
        $project = Project::find($projectId);

        // 1. Validate the incoming request data
        $data = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'problem_solved' => 'nullable|string',
            'my_Role' => 'nullable|string',
            'link_video' => 'nullable|url', // Ensure it's a valid URL
            'image_cover' => 'nullable', // Allow images up to 2MB
            'remove_image_cover' => 'nullable', // For the checkbox
        ]);

        // مصفوفة بيانات التحديث
        $data = $request->except('image_cover', 'remove_image_cover'); // نستثني الصورة مؤقتًا

        // 2. Handle image_cover update
        $imageCoverPath = null;

        if ($request->hasFile('image_cover')) {
            $image = $request->file('image_cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('projects/covers'); // مجلد داخل public مباشرة



            // قراءة الصورة وضغطها وحفظها
            $img = Image::read($image->getRealPath())->encodeByExtension($image->getClientOriginalExtension(), 80);
            file_put_contents($directory . '/' . $filename, (string) $img);

            $imageCoverPath = 'projects/covers/' . $filename;
            $data['image_cover'] = $imageCoverPath;
        } elseif ($request->boolean('remove_image_cover')) {
            // حذف الصورة القديمة
            if ($project->image_cover && file_exists(public_path($project->image_cover))) {
                unlink(public_path($project->image_cover));
            }
            $data['image_cover'] = null;
        }

        // تحديث المشروع بالبيانات الجديدة
        $project->update($data);




        return redirect()->route('project.edit', $project->id)
            ->with('success', 'تم تحديث المشروع بنجاح!');
    }
    // public function update(Request $request, Project $project)
    // {

    //     // هذا الجزء سيكون معقدًا قليلاً لأنه يتضمن تحديث وحذف علاقات موجودة بالإضافة إلى الإضافة
    //     // سأقوم بتضمين منطق أساسي هنا، ولكن التعامل مع الحذف من الحقول المتعددة يتطلب تفكيراً إضافياً.
    //     // لنفترض أنك ستعيد إرسال جميع الحقول المتعددة وسيتم استبدالها أو تحديثها.

    //     $request = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'overview' => 'required|string',
    //         'description' => 'required|string',
    //         'problem_solved' => 'required|string',
    //         'my_Role' => 'required|string|max:255',
    //         'link_video' => 'nullable|url|max:255',
    //         'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    //         'technologies' => 'required|array',
    //         'technologies.*' => 'required|string|max:255',

    //         'key_features' => 'required|array',
    //         'key_features.*' => 'required|string',

    //         'link_name' => 'nullable|array',
    //         'link_name.*' => 'nullable|string|max:255',
    //         'project_links' => 'nullable|array',
    //         'project_links.*' => 'nullable|url|max:255',
    //         'link_name' => [
    //             'nullable',
    //             'array',
    //             Rule::requiredIf(fn() => !empty($request->input('project_links'))),
    //         ],
    //         'project_links' => [
    //             'nullable',
    //             'array',
    //             Rule::requiredIf(fn() => !empty($request->input('link_name'))),
    //         ],
    //         function ($attribute, $value, $fail) use ($request) {
    //             if (!empty($request->input('link_name')) && !empty($request->input('project_links')) && count($request->input('link_name')) !== count($request->input('project_links'))) {
    //                 $fail('The link names and project links must have the same number of entries.');
    //             }
    //         },

    //         'images_gallery' => 'nullable|array',
    //         'images_gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         // هذا الحقل سيسمح لك بتحديد الصور الموجودة التي تريد حذفها
    //         'existing_images_to_delete' => 'nullable|array',
    //         'existing_images_to_delete.*' => 'string|max:255', // المسارات أو المعرفات
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         // تحديث البيانات الأساسية للمشروع
    //         $project->update([
    //             'title' => $request['title'],
    //             'description' => $request['description'],
    //             'overview' => $request['overview'],
    //             'problem_solved' => $validatedData['problem_solved'],
    //             'my_Role' => $validatedData['my_Role'],
    //             'link_video' => $validatedData['link_video'],
    //         ]);

    //         // تحديث صورة الغلاف (إذا تم تحميل واحدة جديدة)
    //         if ($request->hasFile('image_cover')) {
    //             // حذف الصورة القديمة إذا وجدت
    //             if ($project->image_cover) {
    //                 Storage::delete(str_replace('/storage', 'public', $project->image_cover));
    //             }

    //             $image = $request->file('image_cover');
    //             $filename = time() . '.' . $image->getClientOriginalExtension();
    //             $directory = 'public/projects/covers';
    //             $img = Image::read($image->getRealPath())->encodeByExtension($image->getClientOriginalExtension(), 80);
    //             Storage::put($directory . '/' . $filename, (string) $img);
    //             $project->update(['image_cover' => Storage::url($directory . '/' . $filename)]);
    //         }

    //         // تحديث العلاقات (تقنيات، ميزات، روابط):
    //         // الطريقة الأبسط: حذف جميع العلاقات القديمة ثم إعادة إنشائها من البيانات الجديدة
    //         // هذا قد يكون غير فعال للمشاريع الكبيرة، ولكن أبسط للتطبيق.
    //         $project->technologies()->delete();
    //         if (isset($validatedData['technologies'])) {
    //             foreach ($validatedData['technologies'] as $technologyName) {
    //                 if (!empty($technologyName)) {
    //                     $project->technologies()->create(['technologies' => $technologyName]);
    //                 }
    //             }
    //         }

    //         $project->features()->delete();
    //         if (isset($validatedData['key_features'])) {
    //             foreach ($validatedData['key_features'] as $featureText) {
    //                 if (!empty($featureText)) {
    //                     $project->features()->create(['key_features' => $featureText]);
    //                 }
    //             }
    //         }

    //         $project->links()->delete();
    //         if (isset($validatedData['link_name']) && isset($validatedData['project_links'])) {
    //             foreach ($validatedData['link_name'] as $index => $linkName) {
    //                 $linkUrl = $validatedData['project_links'][$index] ?? null;
    //                 if (!empty($linkName) && !empty($linkUrl)) {
    //                     $project->links()->create([
    //                         'link_name' => $linkName,
    //                         'project_links' => $linkUrl,
    //                     ]);
    //                 }
    //             }
    //         }

    //         // التعامل مع حذف صور المعرض الموجودة
    //         if (isset($validatedData['existing_images_to_delete'])) {
    //             foreach ($validatedData['existing_images_to_delete'] as $imageIdToDelete) {
    //                 $image = $project->images()->find($imageIdToDelete);
    //                 if ($image) {
    //                     Storage::delete(str_replace('/storage', 'public', $image->images_gallery));
    //                     $image->delete();
    //                 }
    //             }
    //         }


    //         // إضافة صور المعرض الجديدة (نفس منطق الإنشاء)
    //         if ($request->hasFile('images_gallery')) {
    //             foreach ($request->file('images_gallery') as $galleryImage) {
    //                 if ($galleryImage->isValid()) {
    //                     $filename = time() . '_' . uniqid() . '.' . $galleryImage->getClientOriginalExtension();
    //                     $directory = 'public/projects/gallery';
    //                     $img = Image::read($galleryImage->getRealPath())->encodeByExtension($galleryImage->getClientOriginalExtension(), 80);
    //                     Storage::put($directory . '/' . $filename, (string) $img);
    //                     $imagePublicUrl = Storage::url($directory . '/' . $filename);
    //                     $project->images()->create(['images_gallery' => $imagePublicUrl]);
    //                 }
    //             }
    //         }

    //         DB::commit();
    //         return redirect()->route('portfolio.index')->with('success', 'Project updated successfully!');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Error updating project: ' . $e->getMessage(), ['exception' => $e]);
    //         return redirect()->back()->withInput()->with('error', 'Failed to update project: ' . $e->getMessage());
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction(); // استخدام الـ Transaction في حذف المشروع أيضًا

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
        } catch (\Exception | \Throwable $e) {
            DB::rollBack();
            Log::error('Error deleting project: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'Failed to delete project: ' . $e->getMessage());
        }
    }
}
