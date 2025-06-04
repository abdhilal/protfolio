
    <div class="main-content-wrapper">
        <div class="form-container">
            <h1 class="gradient-text text-center mb-5">تعديل روابط المشروع لـ: {{ $project->title }}</h1>

            <form action="{{ route('project.links.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- استخدام طريقة PUT للتحديث --}}

                {{-- عرض رسائل الأخطاء والنجاح --}}
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

                <div id="links-container">
                    @forelse($project->links as $index => $link)
                        <div class="mb-3 p-3 border rounded border-secondary link-item">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="link_name_{{ $index }}" class="form-label">اسم الرابط</label>
                                    <input type="text" class="form-control" id="link_name_{{ $index }}"
                                        name="links[{{ $index }}][name]" placeholder="مثال: GitHub Repo"
                                        value="{{ old('links.' . $index . '.name', $link->link_name) }}" required>
                                    @error('links.' . $index . '.name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="project_link_{{ $index }}" class="form-label">عنوان URL للرابط</label>
                                    <input type="url" class="form-control" id="project_link_{{ $index }}"
                                        name="links[{{ $index }}][url]" placeholder="مثال: https://github.com/your-repo"
                                        value="{{ old('links.' . $index . '.url', $link->project_links) }}" required>
                                    @error('links.' . $index . '.url')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($project->links->count() > 1 || $loop->first)
                                <button type="button" class="btn remove-btn mt-3" title="إزالة الرابط">
                                    <i class="fas fa-trash"></i> إزالة
                                </button>
                            @endif
                        </div>
                    @empty
                        <div class="mb-3 p-3 border rounded border-secondary link-item">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="link_name_0" class="form-label">اسم الرابط</label>
                                    <input type="text" class="form-control" id="link_name_0"
                                        name="links[0][name]" placeholder="مثال: GitHub Repo"
                                        value="{{ old('links.0.name') }}" required>
                                    @error('links.0.name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="project_link_0" class="form-label">عنوان URL للرابط</label>
                                    <input type="url" class="form-control" id="project_link_0"
                                        name="links[0][url]" placeholder="مثال: https://github.com/your-repo"
                                        value="{{ old('links.0.url') }}" required>
                                    @error('links.0.url')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" class="btn remove-btn mt-3" title="إزالة الرابط" style="display: none;">
                                <i class="fas fa-trash"></i> إزالة
                            </button>
                        </div>
                    @endforelse
                </div>

                <button type="button" id="add-link-btn" class="btn add-more-btn">
                    <i class="fas fa-plus"></i> إضافة رابط آخر
                </button>

                <button type="submit" class="btn btn-gradient btn-submit">تحديث الروابط</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const linksContainer = document.getElementById('links-container');
            const addLinkBtn = document.getElementById('add-link-btn');

            // Find the highest existing index to continue from
            let linkIndex = 0;
            linksContainer.querySelectorAll('.link-item').forEach((item, index) => {
                const nameInput = item.querySelector('input[name^="links["][name$="][name]"]');
                if (nameInput) {
                    const match = nameInput.name.match(/links\[(\d+)\]\[name\]/);
                    if (match && parseInt(match[1]) >= linkIndex) {
                        linkIndex = parseInt(match[1]) + 1;
                    }
                }
            });


            // Function to update visibility of remove buttons
            function updateRemoveButtons() {
                const linkItems = linksContainer.querySelectorAll('.link-item');
                if (linkItems.length <= 1) {
                    // Hide remove button if only one item
                    linkItems[0].querySelector('.remove-btn').style.display = 'none';
                } else {
                    // Show all remove buttons
                    linkItems.forEach(item => {
                        item.querySelector('.remove-btn').style.display = 'block';
                    });
                }
            }

            // Call on initial load
            updateRemoveButtons();

            addLinkBtn.addEventListener('click', function() {
                const newLinkDiv = document.createElement('div');
                newLinkDiv.classList.add('mb-3', 'p-3', 'border', 'rounded', 'border-secondary', 'link-item');
                newLinkDiv.innerHTML = `
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="link_name_${linkIndex}" class="form-label">اسم الرابط</label>
                            <input type="text" class="form-control" id="link_name_${linkIndex}"
                                name="links[${linkIndex}][name]" placeholder="مثال: رابط مباشر للمشروع" required>
                        </div>
                        <div class="col-md-6">
                            <label for="project_link_${linkIndex}" class="form-label">عنوان URL للرابط</label>
                            <input type="url" class="form-control" id="project_link_${linkIndex}"
                                name="links[${linkIndex}][url]" placeholder="مثال: https://example.com/project" required>
                        </div>
                    </div>
                    <button type="button" class="btn remove-btn mt-3" title="إزالة الرابط">
                        <i class="fas fa-trash"></i> إزالة
                    </button>
                `;
                linksContainer.appendChild(newLinkDiv);
                linkIndex++;
                updateRemoveButtons();
            });

            // Event delegation for remove buttons
            linksContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-btn')) {
                    const linkItem = e.target.closest('.link-item');
                    if (linksContainer.querySelectorAll('.link-item').length > 1) {
                        linkItem.remove();
                        updateRemoveButtons();
                    }
                }
            });
        });
    </script>
