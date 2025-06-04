<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Portfolio Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('fontawesome/css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <style>
        /* Form-specific styles - consider moving to style.css */
        .form-container {
            max-width: 800px;
            margin: 5rem auto;
            padding: 2.5rem;
        }

        .form-label {
            color: var(--text-gray-300);
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: #1F2937;
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
        }

        /* Error and success message styles - ensure these are also in style.css */
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
        <div class="form-container card-glassmorphism">
            <h1 class="gradient-text text-center mb-5">Create New Portfolio Project</h1>
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                    <label for="title" class="form-label">Project Title <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="e.g., Enterprise Resource Planning System" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="overview" class="form-label">Overview <span class="text-red-500">*</span></label>
                    <textarea class="form-control" id="overview" name="overview" rows="3"
                        placeholder="A brief summary of the project and its purpose." required>{{ old('overview') }}</textarea>
                    @error('overview')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Project Description <span
                            class="text-red-500">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        placeholder="Detailed description of the project, functionalities, and technologies." required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="problem_solved" class="form-label">Problem Solved <span
                            class="text-red-500">*</span></label>
                    <textarea class="form-control" id="problem_solved" name="problem_solved" rows="4"
                        placeholder="Explain the problem the project addresses and how it solves it." required>{{ old('problem_solved') }}</textarea>
                    @error('problem_solved')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="my_Role" class="form-label">My Role <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" id="my_Role" name="my_Role"
                        placeholder="e.g., Backend Developer, Full-stack Developer" value="{{ old('my_Role') }}"
                        required>
                    @error('my_Role')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="link_video" class="form-label">Project Video Link (YouTube/Vimeo embed URL)</label>
                    <input type="text" class="form-control" id="link_video" name="link_video"
                        placeholder="e.g., https://www.youtube.com/embed/YOUR_VIDEO_ID"
                        value="{{ old('link_video') }}">
                    @error('link_video')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image_cover" class="form-label">Project Cover Image</label>
                    <input type="file" class="form-control" id="image_cover" name="image_cover">
                    <small class="text-gray-400">Upload a single image for project thumbnail/cover.</small>
                    @error('image_cover')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-gradient btn-submit">Create Project</button>
                <a href="index.html" class="btn btn-secondary ms-3 btn-submit">Cancel</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
