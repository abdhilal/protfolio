<div class="main-content-wrapper">
    <div class="form-container">
        <h1 class="gradient-text text-center mb-5">Edit Project Technologies for Project: {{ $project->title }}</h1>

        <form action="{{ route('project.technologies.update', $project->id) }}" method="POST">
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

            <div id="technologies-container">
                @forelse($project->technologies as $index => $tech)
                    <div class="mb-3 d-flex align-items-center technology-item">
                        <label for="technologies_{{ $index }}"
                            class="form-label visually-hidden">Technology</label>
                        <input type="text" class="form-control" id="technologies_{{ $index }}"
                            name="technologies[]" placeholder="e.g., Laravel, React, MySQL"
                            value="{{ old('technologies.' . $index, $tech->technologies) }}" required>
                        @if ($project->technologies->count() > 1 || $loop->first)
                            {{-- Allow removing if more than one, or always for the first if no initial ones --}}
                            <button type="button" class="btn remove-btn ms-2" title="Remove Technology">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                        @error('technologies.' . $index)
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                @empty
                    <div class="mb-3 d-flex align-items-center technology-item">
                        <label for="technologies_0" class="form-label visually-hidden">Technology</label>
                        <input type="text" class="form-control" id="technologies_0" name="technologies[]"
                            placeholder="e.g., Laravel, React, MySQL" value="{{ old('technologies.0') }}" required>
                        <button type="button" class="btn remove-btn ms-2" title="Remove Technology"
                            style="display: none;">
                            <i class="fas fa-trash"></i>
                        </button>
                        @error('technologies.0')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                @endforelse
            </div>

            <button type="button" id="add-technology-btn" class="btn add-more-btn">
                <i class="fas fa-plus"></i> Add Another Technology
            </button>

            <button type="submit" class="btn btn-gradient btn-submit">Update Technologies</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const technologiesContainer = document.getElementById('technologies-container');
        const addTechnologyBtn = document.getElementById('add-technology-btn');

        let technologyIndex = {{ $project->technologies->count() > 0 ? $project->technologies->count() : 0 }};

        // Function to update visibility of remove buttons
        function updateRemoveButtons() {
            const technologyItems = technologiesContainer.querySelectorAll('.technology-item');
            if (technologyItems.length <= 1) {
                // Hide remove button if only one item
                technologyItems[0].querySelector('.remove-btn').style.display = 'none';
            } else {
                // Show all remove buttons
                technologyItems.forEach(item => {
                    item.querySelector('.remove-btn').style.display = 'block';
                });
            }
        }

        // Call on initial load
        updateRemoveButtons();

        addTechnologyBtn.addEventListener('click', function() {
            const newTechnologyDiv = document.createElement('div');
            newTechnologyDiv.classList.add('mb-3', 'd-flex', 'align-items-center', 'technology-item');
            newTechnologyDiv.innerHTML = `
                    <label for="technologies_${technologyIndex}" class="form-label visually-hidden">Technology</label>
                    <input type="text" class="form-control" id="technologies_${technologyIndex}" name="technologies[]"
                        placeholder="e.g., HTML, CSS, JavaScript" required>
                    <button type="button" class="btn remove-btn ms-2" title="Remove Technology">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
            technologiesContainer.appendChild(newTechnologyDiv);
            technologyIndex++;
            updateRemoveButtons();
        });

        // Event delegation for remove buttons
        technologiesContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-btn')) {
                const technologyItem = e.target.closest('.technology-item');
                if (technologiesContainer.querySelectorAll('.technology-item').length > 1) {
                    technologyItem.remove();
                    updateRemoveButtons();
                }
            }
        });
    });
</script>
