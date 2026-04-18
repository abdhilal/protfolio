<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صور عبد الرحمن هلال | Abdulrahman Hilal Photos</title>
    <meta name="description"
        content="معرض صور عبد الرحمن هلال، مطور Laravel Backend. Abdulrahman Hilal portfolio photos and professional profile images.">
    <meta name="keywords"
        content="صور عبد الرحمن هلال, عبد الرحمن هلال, Abdulrahman Hilal photos, Laravel developer photos, Backend Developer Syria">
    <meta name="author" content="Abdulrahman Hilal">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="{{ route('portfolio.gallery') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="صور عبد الرحمن هلال | Abdulrahman Hilal Photos">
    <meta property="og:description" content="معرض صور عبد الرحمن هلال - Laravel Backend Developer">
    <meta property="og:image"
        content="https://abdr-hilal.ct.ws/images/profile/abdulrahman-hilal-laravel-backend-developer-1.jpg">
    <meta property="og:url" content="{{ route('portfolio.gallery') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="صور عبد الرحمن هلال | Abdulrahman Hilal Photos">
    <meta name="twitter:description" content="Abdulrahman Hilal photos and profile gallery.">
    <meta name="twitter:image"
        content="https://abdr-hilal.ct.ws/images/profile/abdulrahman-hilal-laravel-backend-developer-1.jpg">
    <link rel="icon" href="{{ asset('images/my/wallet.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "CollectionPage",
            "name": "Abdulrahman Hilal Photos",
            "url": "{{ route('portfolio.gallery') }}",
            "about": {
                "@type": "Person",
                "name": "Abdulrahman Hilal",
                "alternateName": "عبد الرحمن هلال"
            },
            "hasPart": [{
                    "@type": "ImageObject",
                    "name": "Abdulrahman Hilal Laravel Backend Developer portrait",
                    "contentUrl": "https://abdr-hilal.ct.ws/images/profile/abdulrahman-hilal-laravel-backend-developer-1.jpg"
                },
                {
                    "@type": "ImageObject",
                    "name": "Abdulrahman Hilal Backend Developer profile photo",
                    "contentUrl": "https://abdr-hilal.ct.ws/images/profile/abdulrahman-hilal-backend-developer-2.jpg"
                },
                {
                    "@type": "ImageObject",
                    "name": "Abdulrahman Hilal official portfolio image",
                    "contentUrl": "https://abdr-hilal.ct.ws/images/my/imamy.png"
                }
            ]
        }
    </script>
</head>

<body>
    <div class="main-content-wrapper">
        <div class="custom-container py-5">
            <header class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h1 class="gradient-text text-3xl m-0">معرض الصور | Photos</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-gradient" href="{{ route('portfolio.index') }}">الصفحة الرئيسية</a>
                    <a class="btn btn-gradient" href="{{ route('portfolio.cv') }}">CV</a>
                    <a class="btn btn-gradient" href="{{ route('portfolio.profile') }}">الصفحة التعريفية</a>
                </div>
            </header>

            <p class="text-gray-300 mb-4">
                صور شخصية ومهنية لعبد الرحمن هلال (Abdulrahman Hilal) مطور Laravel Backend.
            </p>

            <section class="row g-4">
                <article class="col-md-6">
                    <div class="card-glassmorphism p-3 h-100">
                        <img src="{{ asset('images/profile/abdulrahman-hilal-laravel-backend-developer-1.jpg') }}"
                            alt="عبد الرحمن هلال مطور Laravel Backend - صورة شخصية احترافية"
                            class="img-fluid rounded mb-3 w-100" loading="lazy">
                        <h2 class="text-xl text-blue-400 mb-2">صورة احترافية 1</h2>
                        <p class="text-gray-300 mb-0">Abdulrahman Hilal Laravel Backend Developer</p>
                    </div>
                </article>

                <article class="col-md-6">
                    <div class="card-glassmorphism p-3 h-100">
                        <img src="{{ asset('images/profile/abdulrahman-hilal-backend-developer-2.jpg') }}"
                            alt="Abdulrahman Hilal Backend Developer profile image"
                            class="img-fluid rounded mb-3 w-100" loading="lazy">
                        <h2 class="text-xl text-blue-400 mb-2">Professional Photo 2</h2>
                        <p class="text-gray-300 mb-0">Backend Developer profile photo</p>
                    </div>
                </article>

                <article class="col-md-6">
                    <div class="card-glassmorphism p-3 h-100">
                        <img src="{{ asset('images/my/imamy.png') }}"
                            alt="Abdulrahman Hilal official portfolio portrait for Laravel and PHP projects"
                            class="img-fluid rounded mb-3 w-100" loading="lazy">
                        <h2 class="text-xl text-blue-400 mb-2">Portfolio Portrait</h2>
                        <p class="text-gray-300 mb-0">Official image used in the main portfolio page.</p>
                    </div>
                </article>
            </section>
        </div>
    </div>
</body>

</html>
