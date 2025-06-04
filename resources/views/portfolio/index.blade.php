<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdulrahman Hilal - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="icon" href="{{ asset('images/my/wallet.png') }}" >

    <link rel="stylesheet" href={{ asset('fontawesome/css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>

<body>
    <div class="main-content-wrapper">

        <div class="custom-container">
            <header class="py-6  d-flex justify-content-between align-items-center position-relative">
                <a href="#"
                    class="text-decoration-none text-base font-bold gradient-text no-wrap-text ">Abdulrahman Hilal</a>
                <button class="navbar-toggler-custom d-md-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white fs-4"></i>
                </button>

                <div class="collapse navbar-collapse header-nav-collapse d-md-flex" id="navbarNav">
                    <ul class="navbar-nav header-nav-items md:space-x-8">

                        <li class="nav-item">
                            <a class="nav-link custom-hover py-2 px-3" href="#hero"><i class="fas fa-home me-2"
                                    style="font-size: 18px;"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-hover py-2 px-3" href="#about"><i class="fas fa-user me-2"
                                    style="font-size: 18px;"></i> About Me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-hover py-2 px-3" href="#skills"><i class="fas fa-code me-2"
                                    style="font-size: 18px;"></i> Skills</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-hover py-2 px-3" href="#education"><i
                                    class="fas fa-graduation-cap me-2" style="font-size: 18px;"></i> Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-hover py-2 px-3" href="#projects"><i
                                    class="fas fa-folder-open me-2" style="font-size: 18px;"></i> Projects</a>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link custom-hover py-2 px-3" href="#contact"><i class="fas fa-envelope me-2"
                                    style="font-size: 18px;"></i> Contact</a>
                        </li>
                    </ul>
                </div>

            </header>

            <main class="py-8">
                <section id="hero"
                    class="py-12 d-flex flex-column flex-md-row align-items-center text-center md:text-left justify-content-center md:space-x-40 space-y-6 md:space-y-0">
                    <div class="hero-content-left fade-in-left">
                        <h1 class="text-5xl font-bold gradient-text mb-2">Abdulrahman Hilal</h1>
                        <p class="text-xl text-gray-300 mb-4">Backend Developer</p>
                        <div class="d-flex justify-content-center md:justify-start space-x-4">
                            <a href="mailto:abdrahmanmhran3@gmail.com" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover"><i class="fas fa-envelope fa-2x"></i></a>
                            <a href="https://wa.me/+905010588210" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover"><i class="fab fa-whatsapp fa-2x"></i></a>
                            <a href="http://www.linkedin.com/in/abdrhilal" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover"><i class="fab fa-linkedin fa-2x"></i></a>
                            <a href="https://github.com/abdhilal" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover"><i class="fab fa-github fa-2x"></i></a>
                        </div>
                    </div>
                    <div class="mt-4 mt-md-0">
                        <div class="rounded-circle border border-4"
                            style="border-color: var(--blue-400) !important; width: 256px; height: 256px; overflow: hidden;">
                            <img src="{{ asset('images/my/potoMy.jpg') }}" alt="Abdulrahman Hilal" class="w-100 h-100"
                                style="object-fit: cover;">
                        </div>
                    </div>
                </section>

                <section id="about" class="section-padding">
                    <h2 class="text-3xl font-bold gradient-text text-center mb-12 fade-in-left">About Me</h2>
                    <div class="card-glassmorphism p-6 mx-auto">
                        <p class="text-sm text-gray-300 mb-4">
                            Hello! I'm <span class="text-blue-400 font-semibold">Abdulrahman Hilal</span>, a backend
                            developer
                            specializing in Laravel, PHP, and MySQL.
                            I am currently studying at the Technical Institute of Computer Science and living in Azaz,
                            Aleppo.
                        </p>
                        <p class="text-sm text-gray-300 mb-4">
                            I have expertise in developing robust systems using Laravel, with a strong focus on high
                            performance,
                            security, and an excellent user experience. I also utilize HTML, CSS, and JavaScript when
                            needed to build
                            complete interfaces.
                        </p>
                        <p class="text-sm text-gray-300 mb-4">
                            I have developed several projects and am always eager to continue learning and improving my
                            skills
                            to deliver innovative software solutions.
                        </p>
                        <p class="text-sm text-gray-300 mb-4">
                            My passion for development and commitment to deadlines ensure that I deliver high-quality
                            work with
                            optimal performance.
                            I strive for excellence in everything I learn, focusing on building flexible and secure
                            applications.
                        </p>
                        <p class="text-sm text-gray-300 mb-0">
                            My goal is to achieve professionalism in web development, expand my knowledge of modern
                            technologies,
                            and work on projects that bring real value to users.
                        </p>
                    </div>
                </section>

                <section id="skills" class="section-padding">
                    <h2 class="text-3xl font-bold gradient-text text-center mb-12 fade-in-left">Skills</h2>
                    <div class="skills-grid mx-auto">
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fab fa-php text-4xl icon-php"></i>
                            </div>
                            <span class="skill-name mt-2">PHP</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fab fa-laravel text-4xl icon-laravel"></i>
                            </div>
                            <span class="skill-name mt-2">Laravel</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fab fa-js-square text-4xl icon-javascript"></i>
                            </div>
                            <span class="skill-name mt-2">JavaScript</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fab fa-html5 text-4xl icon-html-css"></i>
                            </div>
                            <span class="skill-name mt-2">HTML/CSS</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-database text-4xl icon-mysql"></i>
                            </div>
                            <span class="skill-name mt-2">MySQL</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fab fa-git-alt text-4xl icon-git"></i>
                            </div>
                            <span class="skill-name mt-2">Git</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fab fa-github text-4xl icon-github"></i>
                            </div>
                            <span class="skill-name mt-2">GitHub</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-code text-4xl icon-vscode"></i>
                            </div>
                            <span class="skill-name mt-2">VSCode</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-paper-plane text-4xl icon-postman"></i>
                            </div>
                            <span class="skill-name mt-2">Postman</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-box text-4xl icon-composer"></i>
                            </div>
                            <span class="skill-name mt-2">Composer</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-exchange-alt text-4xl icon-restful"></i>
                            </div>
                            <span class="skill-name mt-2">RESTful APIs</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-sitemap text-4xl icon-mvc"></i>
                            </div>
                            <span class="skill-name mt-2">MVC Architecture</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-file-alt text-4xl icon-swagger"></i>
                            </div>
                            <span class="skill-name mt-2">Swagger API</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-key text-4xl icon-jwt"></i>
                            </div>
                            <span class="skill-name mt-2">JWT (Token)</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-project-diagram text-4xl icon-db-design"></i>
                            </div>
                            <span class="skill-name mt-2">Database Design</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-search text-4xl icon-query-opt"></i>
                            </div>
                            <span class="skill-name mt-2">Query Optimization</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-cogs text-4xl icon-data-mgmt"></i>
                            </div>
                            <span class="skill-name mt-2">Data Management</span>
                        </div>
                        <div class="d-flex flex-column align-items-center skill-item skill-item-animated">
                            <div class="skill-icon-bg">
                                <i class="fas fa-shield-alt text-4xl icon-auth"></i>
                            </div>
                            <span class="skill-name mt-2">Auth/Auth</span>
                        </div>
                    </div>
                </section>

                <section id="education" class="section-padding">
                    <h2 class="text-3xl font-bold gradient-text text-center mb-12 fade-in-left">Education & Training
                    </h2>
                    <div class="d-flex flex-column space-y-8 mx-auto">
                        <div class="card-glassmorphism p-6">
                            <h3 class="text-xl font-semibold mb-2 text-blue-400 d-flex align-items-center">
                                <i class="fas fa-graduation-cap me-2" style="font-size: 24px;"></i> Graduate from
                                Computer Institute at
                                University of Aleppo in the Liberated Areas
                            </h3>
                            <p class="text-gray-300 mb-2">University of Aleppo - Liberated Areas</p>
                            <p class="text-sm text-gray-400 d-flex align-items-center">
                                <i class="far fa-calendar-alt me-2" style="font-size: 18px;"></i> 2023 – 2025
                                (Completed)
                            </p>
                        </div>
                        <div class="card-glassmorphism p-6">
                            <h3 class="text-xl font-semibold mb-2 text-green-400 d-flex align-items-center">
                                <i class="fas fa-laptop-code me-2" style="font-size: 24px;"></i> Backend Developer
                                (Laravel)
                            </h3>
                            <p class="text-gray-300 mb-2">MAPs Organization</p>
                            <p class="text-sm text-gray-400 d-flex align-items-center mb-1">
                                <i class="far fa-calendar-alt me-2" style="font-size: 18px;"></i> Sep 2024 – Mar 2025
                            </p>
                            <p class="text-sm text-gray-400 mb-1">Duration: 245 hours</p>
                            <p class="text-gray-300 mb-0">
                                Completed backend development training focusing on Laravel framework.
                            </p>
                        </div>
                    </div>
                </section>









                <section id="projects" class="section-padding">
                    <h2 class="text-3xl font-bold gradient-text text-center mb-12 fade-in-left">Projects</h2>
                    <div class="project-grid mx-auto">

                        @foreach ($projects as $project)
                            <div class="card-glassmorphism p-4 project-item-animated">
                                @if ($project->image_cover)
                                    <img src="{{ asset($project->image_cover) }}" alt="{{ $project->title }}"
                                        class="w-100 h-64 object-cover rounded-top mb-4">
                                @else
                                    <iframe width="100%" height="320" src="{{ $project->link_video }}"
                                        title=" Enterprise Resource Planning (ERP) System" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen class="rounded-top">
                                    </iframe>
                                @endif


                                <div class="p-4">
                                    <h3 class="text-2xl font-semibold mb-2 text-blue-400">{{ $project->title }}</h3>
                                    </h3>
                                    <p class="mb-4 text-gray-300">
                                        {{ $project->overview }}
                                    </p>
                                    <div class="d-flex flex-wrap gap-2 mb-4">
                                        @foreach ($project->technologies as $technolog)
                                            <span class="tech-badge">{{ $technolog->technologies }}</span>
                                        @endforeach

                                    </div>
                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-gradient"
                                        target="_blank" rel="noopener noreferrer">عرض التفاصيل</a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </section>











                <section id="contact" class="section-padding">
                    <h2 class="text-3xl font-bold gradient-text text-center mb-12 fade-in-left">Contact Me</h2>
                    <div class="card-glassmorphism p-6 mx-auto fade-in-bottom contact-container">
                        <p class="text-xl text-gray-300 mb-6 text-center">You can reach out to me through the following
                            platforms:</p>
                        <div class="d-flex justify-content-center flex-wrap gap-4"> <a
                                href="mailto:abdrahmanmhran3@gmail.com" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover d-flex flex-column align-items-center text-decoration-none p-3">
                                <i class="fas fa-envelope fa-3x mb-2"></i>
                                <span class="text-sm">Email</span>
                            </a>
                            <a href="https://wa.me/+905010588210" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover d-flex flex-column align-items-center text-decoration-none p-3">
                                <i class="fab fa-whatsapp fa-3x mb-2"></i>
                                <span class="text-sm">WhatsApp</span>
                            </a>
                            <a href="http://www.linkedin.com/in/abdrhilal" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover d-flex flex-column align-items-center text-decoration-none p-3">
                                <i class="fab fa-linkedin fa-3x mb-2"></i>
                                <span class="text-sm">LinkedIn</span>
                            </a>
                            <a href="https://github.com/abdhilal" target="_blank" rel="noopener noreferrer"
                                class="text-gray-300 custom-hover d-flex flex-column align-items-center text-decoration-none p-3">
                                <i class="fab fa-github fa-3x mb-2"></i>
                                <span class="text-sm">GitHub</span>
                            </a>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="py-8 text-gray-400 text-center d-flex align-items-center justify-content-center">
                Abdulrahman Hilal © 2025
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer for scroll animations
            const sections = document.querySelectorAll(
                '.fade-in-left, .fade-in-bottom, .project-item-animated, .skill-item-animated');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (entry.target.classList.contains('skill-item-animated')) {
                            const index = Array.from(entry.target.parentNode.children).indexOf(entry
                                .target);
                            setTimeout(() => {
                                entry.target.classList.add('visible');
                            }, index * 100);
                        } else {
                            entry.target.classList.add('fade-in-visible');
                        }
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            sections.forEach(section => {
                observer.observe(section);
            });





            // Handle mobile navigation collapse after clicking a link
            const navLinks = document.querySelectorAll('.header-nav-items .nav-link');
            const navbarCollapse = document.getElementById('navbarNav');
            const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                toggle: false
            });

            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarCollapse.classList.contains('show')) {
                        bsCollapse.hide();
                    }
                });
            });

        });
    </script>
</body>

</html>
