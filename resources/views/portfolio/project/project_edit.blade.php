
    <div class="main-content-wrapper">
        <div class="form-container">
            <h1 class="gradient-text text-center mb-5">تعديل مشروع: {{ $project->title }}</h1>
            <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Use PUT method for updates --}}

                {{-- Display error and success messages --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label for="title" class="form-label">عنوان المشروع <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="مثال: نظام تخطيط موارد المؤسسات" value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="overview" class="form-label">نظرة عامة <span class="text-red-500">*</span></label>
                    <textarea class="form-control" id="overview" name="overview" rows="3"
                        placeholder="ملخص موجز للمشروع والغرض منه." required>{{ old('overview', $project->overview) }}</textarea>
                    @error('overview')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">وصف المشروع <span
                            class="text-red-500">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        placeholder="وصف تفصيلي للمشروع، وظائفه، والتقنيات المستخدمة." required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="problem_solved" class="form-label">المشكلة التي تم حلها <span
                            class="text-red-500">*</span></label>
                    <textarea class="form-control" id="problem_solved" name="problem_solved" rows="4"
                        placeholder="اشرح المشكلة التي يعالجها المشروع وكيف يحلها." required>{{ old('problem_solved', $project->problem_solved) }}</textarea>
                    @error('problem_solved')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="my_Role" class="form-label">دوري <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" id="my_Role" name="my_Role"
                        placeholder="مثال: مطور واجهة خلفية، مطور متكامل" value="{{ old('my_Role', $project->my_Role) }}"
                        required>
                    @error('my_Role')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="link_video" class="form-label">رابط فيديو المشروع (عنوان URL مضمن من YouTube/Vimeo)</label>
                    <input type="url" class="form-control" id="link_video" name="link_video"
                        placeholder="مثال: https://www.youtube.com/embed/your-video-id"
                        value="{{ old('link_video', $project->link_video) }}">
                    @error('link_video')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image_cover" class="form-label">صورة غلاف المشروع</label>
                    @if ($project->image_cover)
                        <div class="mb-2">
                            <p class="text-gray-400 mb-1">الصورة الحالية:</p>
                            <img src="{{ asset( $project->image_cover) }}" alt="Project Cover" class="current-cover-image" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; height: auto;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_image_cover" id="remove_image_cover">
                                <label class="form-check-label" for="remove_image_cover">
                                    حذف صورة الغلاف الحالية
                                </label>
                            </div>
                        </div>
                    @endif
                    <input type="file" class="form-control" id="image_cover" name="image_cover" accept="image/*">
                    <small class="text-gray-400">تحميل صورة واحدة لغلاف المشروع / الصورة المصغرة. ستستبدل الصورة الحالية إن وجدت.</small>
                    @error('image_cover')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-gradient btn-submit">تحديث المشروع</button>
            </form>
        </div>
    </div>



