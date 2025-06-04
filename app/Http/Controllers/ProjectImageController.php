<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ProjectImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Update the specified resource in storage.
     */   public function update(Request $request, Project $project)
    {
        $request->validate([
            'new_images.*' => 'nullable|image', // للصور الجديدة
            'removed_images' => 'nullable|json', // لمعرفات الصور المراد حذفها
        ]);

        // 1. التعامل مع حذف الصور الموجودة
        $removedImageIds = json_decode($request->input('removed_images', '[]'));
        if (is_iterable($removedImageIds)) {
            foreach ($removedImageIds as $imageId) {

                $image = ProjectImage::find($imageId);

                if ($image && $image->project_id === $project->id) {

                    // حذف الملف من التخزين
                    unlink(public_path($image->images_gallery));
                    // حذف السجل من قاعدة البيانات
                    $image->delete();
                }
            }
        }

        // 2. التعامل مع إضافة صور جديدة
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {


                $imageCoverPath = null;

                $image = $file;
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $directory = public_path('projects/covers'); // مجلد داخل public مباشرة



                // قراءة الصورة وضغطها وحفظها
                $img = Image::read($image->getRealPath())->encodeByExtension($image->getClientOriginalExtension(), 80);
                file_put_contents($directory . '/' . $filename, (string) $img);

                $imageCoverPath = 'projects/covers/' . $filename;



                $project->images()->create([
                    'images_gallery' => $imageCoverPath,
                ]);
            }
        }

        return redirect()->route('project.edit', $project->id)
            ->with('success', 'تم تحديث صور المشروع بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectImage $projectImage)
    {
        //
    }
}
