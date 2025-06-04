<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- Assuming you have a custom style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Form-specific styles - consider moving to style.css */
        :root {
            --text-gray-100: #F3F4F6;
            --text-gray-300: #D1D5DB;
            --text-gray-400: #9CA3AF;
            --blue-500: #3B82F6;
            --blue-600: #2563EB;
            --red-500: #EF4444;
            --green-400: #4CAF50; /* A common green for success messages */
        }

        .form-container {
            max-width: 900px;
            margin: 5rem auto;
            padding: 2.5rem;
            background-color: #1F2937;
            /* Example background */
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: var(--text-gray-100);
        }

        .form-label {
            color: var(--text-gray-300);
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: #374151;
            /* Darker input background */
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 0.75rem;
            color: var(--text-gray-100);
            width: 100%;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--blue-500);
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }

        .add-more-btn {
            background-color: var(--blue-500);
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            margin-top: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .add-more-btn:hover {
            background-color: var(--blue-600);
            color: white;
        }

        .remove-btn {
            background-color: var(--red-500);
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            margin-top: 0.5rem;
            margin-left: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .remove-btn:hover {
            filter: brightness(0.9);
            color: white;
        }

        .btn-submit {
            margin-top: 1.5rem;
            width: auto;
            padding: 0.75rem 2rem;
            background: linear-gradient(to right, #6EE7B7, #3B82F6);
            color: white;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }


        .gradient-text {
            /* You might define this in style.css, but including here for completeness */
            background: linear-gradient(to right, #6EE7B7, #3B82F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Image preview styles */
        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .image-preview-wrapper {
            position: relative;
            width: 150px;
            height: 150px;
            border: 1px solid #4B5563;
            border-radius: 0.25rem;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #374151;
        }

        .image-preview-wrapper img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .image-preview-wrapper .remove-existing-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(239, 68, 68, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.875rem;
            z-index: 10;
        }

        .new-image-input-group {
            border: 1px solid #4B5563;
            border-radius: 0.25rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        #new-image-previews { /* Added ID for the new image previews */
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }

        /* Error and success message styles */
        .error-message {
            color: var(--red-500);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--red-500);
            border: 1px solid var(--red-500);
            border-radius: 0.25rem;
            padding: 0.75rem 1.25rem;
        }

        .alert-success {
            background-color: rgba(76, 175, 80, 0.2);
            color: var(--green-400);
            border: 1px solid var(--green-400);
            border-radius: 0.25rem;
            padding: 0.75rem 1.25rem;
        }
    </style>
</head>

<body>
    <div class="main-content-wrapper">
        <div class="form-container">
            <h1 class="gradient-text text-center mb-5">تعديل صور المشروع لـ: {{ $project->title }}</h1>

            <form action="{{ route('project.images.update', $project->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST') {{-- Using POST, handle image deletion separately in the backend --}}

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

                <h3 class="text-white mb-3">الصور الحالية</h3>
                <div class="image-preview-container">
                    @forelse($project->images as $image)
                        <div class="image-preview-wrapper" id="existing-image-{{ $image->id }}">
                            <img src="{{ asset($image->images_gallery) }}" alt="Project Image">
                            <button type="button" class="remove-existing-image" data-image-id="{{ $image->id }}"
                                title="إزالة هذه الصورة">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @empty
                        <p class="text-gray-400">لا توجد صور حالية لهذا المشروع.</p>
                    @endforelse
                </div>

                <hr class="border-secondary my-4">

                <h3 class="text-white mb-3">إضافة صور جديدة</h3>
                <div class="mb-3">
                    <label for="new_images" class="form-label">اختر صورًا جديدة</label>
                    <input type="file" class="form-control" id="new_images" name="new_images[]" accept="image/*"
                        multiple>
                    @error('new_images.*') {{-- Wildcard for array validation --}}
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Container for new image previews --}}
                <div id="new-image-previews" class="image-preview-container"></div>


                <input type="hidden" name="removed_images" id="removed-images-input">

                <button type="submit" class="btn btn-submit">تحديث الصور</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newFileInput = document.getElementById('new_images');
            const newImagePreviewsContainer = document.getElementById('new-image-previews');
            const removedImagesInput = document.getElementById('removed-images-input');
            const existingImagePreviewContainer = document.querySelector('.image-preview-container');

            // Array to store IDs of images to be removed
            let removedImageIds = [];

            // Event listener for showing previews of newly selected images
          newFileInput.addEventListener('change', function() {
    newImagePreviewsContainer.innerHTML = ''; // Clear previous previews

    if (this.files && this.files.length > 0) {
        Array.from(this.files).forEach((file) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('image-preview-wrapper');
                    imgWrapper.innerHTML = `<img src="${e.target.result}" alt="${file.name}">`;
                    newImagePreviewsContainer.appendChild(imgWrapper);
                };

                reader.readAsDataURL(file);
            }
        });
    }
});

            // Event listener for removing existing images
            existingImagePreviewContainer.addEventListener('click', function(e) {
                const removeBtn = e.target.closest('.remove-existing-image');
                if (removeBtn) {
                    const imageId = removeBtn.dataset.imageId;
                    if (confirm('هل أنت متأكد أنك تريد حذف هذه الصورة؟')) {
                        // Add image ID to the array of removed images
                        removedImageIds.push(imageId);
                        // Update the hidden input field
                        removedImagesInput.value = JSON.stringify(removedImageIds);
                        // Remove the image preview from the DOM
                        document.getElementById(`existing-image-${imageId}`).remove();
                    }
                }
            });
        });
    </script>
</body>

</html>
