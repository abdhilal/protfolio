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
        @include('portfolio.project.project_edit')
        @include('portfolio.project.project_features')
        @include('portfolio.project.project_images')
        @include('portfolio.project.project_links')
        @include('portfolio.project.project_technologies')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
