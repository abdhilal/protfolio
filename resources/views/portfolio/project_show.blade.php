<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Abdulrahman Hilal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('fontawesome/css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="icon" href="{{ asset('images/my/wallet.png') }}">

</head>

<body>
    <div class="main-content-wrapper">
        <div class="project-detail-container py-5">
            <header class="text-center mb-5">
                <a href="{{ route('portfolio.index') }}" class="btn btn-gradient back-button">
                    <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
                </a>
                <h1 class="text-4xl font-bold gradient-text mt-4">{{ $project->title }}</h1>
            </header>

            <div class="card-glassmorphism p-5 mb-5">
                <h2 class="text-2xl font-bold text-blue-400 mb-3">Overview</h2>
                <p class="text-lg text-gray-300 mb-4">
                    {{ $project->overview }}
                </p>

                <h3 class="text-xl font-bold text-blue-400 mb-3">Technologies Used</h3>
                <div class="d-flex flex-wrap gap-2 mb-4">

                    @foreach ($project->technologies as $technolog)
                        <span class="tech-badge">{{ $technolog->technologies }}</span>
                    @endforeach

                </div>

                <h3 class="text-xl font-bold text-blue-400 mb-3">Key Features</h3>
                <ul class="text-gray-300 mb-4">

                    @foreach ($project->features as $feature)
                        <li class="mb-2"><i class="fas fa-check-circle me-2 text-green-400"></i>
                            {{ $feature->key_features }}</li>
                    @endforeach



                </ul>

                <h3 class="text-xl font-bold text-blue-400 mb-3">Problem Solved</h3>
                <p class="text-lg text-gray-300 mb-4">
                    {{ $project->problem_solved }}
                </p>
                <h3 class="text-xl font-bold text-blue-400 mb-3">description</h3>
                <p class="text-lg text-gray-300 mb-4">
                    {!! nl2br(e($project->description)) !!}
                </p>

                <h3 class="text-xl font-bold text-blue-400 mb-3">My Role</h3>
                <p class="text-lg text-gray-300 mb-4">
                    {{ $project->my_Role }}

                <h3 class="text-xl font-bold text-blue-400 mb-3">Visuals & Demo</h3>
                @if ($project->link_video)
                    <div class="ratio ratio-16x9 mb-4">
                        <iframe width="300" height="220" src="{{ $project->link_video }}"
                            title=" Enterprise Resource Planning (ERP) System" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="rounded-top">
                        </iframe>
                    </div>
                @endif


                <div class="row project-image-gallery">

                    @foreach ($project->images as $image)
                        @if (!$image->images_gallery == null)
                            <div class="col-md-6 mb-4">
                                <img src="{{ asset($image->images_gallery) }}" alt="Project Image" class="img-fluid">
                            </div>
                        @endif
                    @endforeach








                </div>

                @foreach ($project->links as $link)
                    @php
                        $label = null;
                        $icon = null;

                        switch ($link->link_name) {
                            case 'GitHub':
                                $label = 'View on GitHub';
                                $icon = 'fab fa-github';
                                break;

                            case 'Domen':
                                $label = 'View on Domen';
                                $icon = 'fas fa-link';
                                break;
                        }
                    @endphp

                    @if ($label)
                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <a href="{{ $link->project_links }}" target="_blank" rel="noopener noreferrer"
                                class="btn btn-gradient">
                                <i class="{{ $icon }} me-2"></i> {{ $label }}
                            </a>
                        </div>
                    @endif
                @endforeach


            </div>

            <footer class="py-4 text-gray-400 text-center">
                Abdulrahman Hilal © 2025
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
