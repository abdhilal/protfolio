<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>السيرة الذاتية لعبد الرحمن هلال | Abdulrahman Hilal CV</title>
    <meta name="description"
        content="صفحة السيرة الذاتية الرسمية لعبد الرحمن هلال، مطور Backend متخصص في Laravel وPHP وMySQL مع روابط مباشرة لملفات CV بالعربية والإنجليزية.">
    <meta name="keywords"
        content="عبد الرحمن هلال CV, السيرة الذاتية عبدالرحمن هلال, Abdulrahman Hilal CV, Laravel Backend CV, PHP Developer Resume">
    <meta name="author" content="Abdulrahman Hilal">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('portfolio.cv') }}">
    <meta property="og:type" content="profile">
    <meta property="og:title" content="السيرة الذاتية لعبد الرحمن هلال | Abdulrahman Hilal CV">
    <meta property="og:description" content="روابط مباشرة لتحميل السيرة الذاتية مع ملخص مهني.">
    <meta property="og:image"
        content="https://abdr-hilal.ct.ws/images/profile/abdulrahman-hilal-laravel-backend-developer-1.jpg">
    <meta property="og:url" content="{{ route('portfolio.cv') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Abdulrahman Hilal CV">
    <meta name="twitter:description" content="Laravel Backend Developer resume page.">
    <meta name="twitter:image"
        content="https://abdr-hilal.ct.ws/images/profile/abdulrahman-hilal-laravel-backend-developer-1.jpg">
    <link rel="icon" href="{{ asset('images/my/wallet.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "Person",
                    "name": "Abdulrahman Hilal",
                    "alternateName": "عبد الرحمن هلال",
                    "jobTitle": "Backend Developer",
                    "url": "https://abdr-hilal.ct.ws/",
                    "sameAs": [
                        "https://github.com/abdhilal",
                        "https://www.linkedin.com/in/abdrhilal/",
                        "https://www.instagram.com/abdr_hilal/"
                    ]
                },
                {
                    "@type": "CreativeWork",
                    "name": "Abdulrahman Hilal CV",
                    "url": "https://abdr-hilal.ct.ws/cv/CV-Abdulrahman-Hilal-en.pdf",
                    "author": {
                        "@type": "Person",
                        "name": "Abdulrahman Hilal"
                    },
                    "inLanguage": ["en", "ar"]
                }
            ]
        }
    </script>
</head>

<body>
    <div class="main-content-wrapper">
        <div class="custom-container py-5">
            <header class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h1 class="gradient-text text-3xl m-0">السيرة الذاتية | CV</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-gradient" href="{{ route('portfolio.index') }}">الصفحة الرئيسية</a>
                    <a class="btn btn-gradient" href="{{ route('portfolio.gallery') }}">الصور</a>
                    <a class="btn btn-gradient" href="{{ route('portfolio.profile') }}">الصفحة التعريفية</a>
                </div>
            </header>

            <section class="card-glassmorphism p-4 mb-4">
                <h2 class="text-2xl text-blue-400 mb-3">ملخص مهني</h2>
                <p class="text-gray-300 mb-3">
                    عبد الرحمن هلال مطور Backend متخصص في Laravel وPHP وMySQL، مع خبرة في بناء REST APIs وتطوير أنظمة ويب
                    قابلة للتوسع.
                </p>
                <p class="text-gray-300 mb-0">
                    Abdulrahman Hilal is a backend developer specialized in Laravel, PHP, and MySQL with practical
                    experience in scalable web platforms and API engineering.
                </p>
            </section>

            <section class="card-glassmorphism p-4 mb-4">
                <h2 class="text-2xl text-blue-400 mb-3">روابط تحميل مباشرة</h2>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-gradient" href="{{ asset('cv/CV-Abdulrahman-Hilal-ar.pdf') }}" target="_blank"
                        rel="noopener noreferrer">
                        تحميل السيرة الذاتية (عربي PDF)
                    </a>
                    <a class="btn btn-gradient" href="{{ asset('cv/CV-Abdulrahman-Hilal-en.pdf') }}" target="_blank"
                        rel="noopener noreferrer">
                        Download CV (English PDF)
                    </a>
                </div>
                <p class="text-gray-300 mt-3 mb-0">
                    روابط مباشرة لمحركات البحث:
                    <br>
                    {{ asset('cv/CV-Abdulrahman-Hilal-ar.pdf') }}
                    <br>
                    {{ asset('cv/CV-Abdulrahman-Hilal-en.pdf') }}
                </p>
            </section>

            <section class="card-glassmorphism p-4">
                <h2 class="text-2xl text-blue-400 mb-3">معلومات أساسية</h2>
                <ul class="text-gray-300 mb-0">
                    <li>الاسم: عبد الرحمن هلال</li>
                    <li>الموقع: سوريا - إدلب</li>
                    <li>البريد: abdrahmanmhran3@gmail.com</li>
                    <li>الهاتف: +90 501 058 8210</li>
                    <li>الموقع الشخصي: https://abdr-hilal.ct.ws/</li>
                </ul>
            </section>
        </div>
    </div>
</body>

</html>
