<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectLink;
use Illuminate\Http\Request;

class ProjectLinkController extends Controller
{

    public function update(Request $request, Project $project)
    {

        $request->validate([
            'links' => 'required|array|min:1',
            'links.*.name' => 'nullable|string|max:255', // اسم الرابط يمكن أن يكون فارغاً إذا لم يحدد
            'links.*.url' => 'nullable|url|max:2048', // عنوان URL يمكن أن يكون فارغاً
        ]);

        // حذف الروابط الموجودة لهذا المشروع
        $project->links()->delete();

        // إنشاء روابط جديدة بناءً على المصفوفة المرسلة
        foreach ($request->links as $linkData) {
            if (!empty($linkData['name']) && !empty($linkData['url'])) { // حفظ فقط إذا كان كلا الحقلين غير فارغين
                $project->links()->create([
                    'link_name' => $linkData['name'],
                    'project_links' => $linkData['url'],
                ]);
            }
        }

        return redirect()->route('project.edit', $project->id)
                         ->with('success', 'تم تحديث روابط المشروع بنجاح!');
    }
}
