
    <div class="main-content-wrapper">
        <div class="form-container">
            <h1 class="gradient-text text-center mb-5">تعديل ميزات المشروع لـ: {{ $project->title }}</h1>

            <form action="{{ route('project.features.update', $project->id) }}" method="POST">
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

                <div id="features-container">
                    @forelse($project->features as $index => $feature)
                        <div class="mb-3 d-flex align-items-center feature-item">
                            <label for="feature_{{ $index }}" class="form-label visually-hidden">الميزة</label>
                            <input type="text" class="form-control" id="feature_{{ $index }}"
                                name="features[]" placeholder="مثال: تسجيل دخول المستخدم، لوحة تحكم إدارية"
                                value="{{ old('features.' . $index, $feature->key_features) }}" required>
                            @if ($project->features->count() > 1 || $loop->first) {{-- Allow removing if more than one, or always for the first if no initial ones --}}
                                <button type="button" class="btn remove-btn ms-2" title="إزالة الميزة">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endif
                            @error('features.' . $index)
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    @empty
                        <div class="mb-3 d-flex align-items-center feature-item">
                            <label for="feature_0" class="form-label visually-hidden">الميزة</label>
                            <input type="text" class="form-control" id="feature_0" name="features[]"
                                placeholder="مثال: تسجيل دخول المستخدم، لوحة تحكم إدارية" value="{{ old('features.0') }}" required>
                            <button type="button" class="btn remove-btn ms-2" title="إزالة الميزة" style="display: none;">
                                <i class="fas fa-trash"></i>
                            </button>
                            @error('features.0')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforelse
                </div>

                <button type="button" id="add-feature-btn" class="btn add-more-btn">
                    <i class="fas fa-plus"></i> إضافة ميزة أخرى
                </button>

                <button type="submit" class="btn btn-gradient btn-submit">تحديث الميزات</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const featuresContainer = document.getElementById('features-container');
            const addFeatureBtn = document.getElementById('add-feature-btn');

            let featureIndex = {{ $project->features->count() > 0 ? $project->features->count() : 0 }};

            // Function to update visibility of remove buttons
            function updateRemoveButtons() {
                const featureItems = featuresContainer.querySelectorAll('.feature-item');
                if (featureItems.length <= 1) {
                    // Hide remove button if only one item
                    featureItems[0].querySelector('.remove-btn').style.display = 'none';
                } else {
                    // Show all remove buttons
                    featureItems.forEach(item => {
                        item.querySelector('.remove-btn').style.display = 'block';
                    });
                }
            }

            // Call on initial load
            updateRemoveButtons();

            addFeatureBtn.addEventListener('click', function() {
                const newFeatureDiv = document.createElement('div');
                newFeatureDiv.classList.add('mb-3', 'd-flex', 'align-items-center', 'feature-item');
                newFeatureDiv.innerHTML = `
                    <label for="feature_${featureIndex}" class="form-label visually-hidden">الميزة</label>
                    <input type="text" class="form-control" id="feature_${featureIndex}" name="features[]"
                        placeholder="مثال: نظام دفع آمن، تحليلات البيانات" required>
                    <button type="button" class="btn remove-btn ms-2" title="إزالة الميزة">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
                featuresContainer.appendChild(newFeatureDiv);
                featureIndex++;
                updateRemoveButtons();
            });

            // Event delegation for remove buttons
            featuresContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-btn')) {
                    const featureItem = e.target.closest('.feature-item');
                    if (featuresContainer.querySelectorAll('.feature-item').length > 1) {
                        featureItem.remove();
                        updateRemoveButtons();
                    }
                }
            });
        });
    </script>
</body>

</html>
