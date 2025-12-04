<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Portfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --light-bg: #f8f9fa;
            --dark-bg: #1a1a2e;
            --text-dark: #2d3436;
            --text-light: #636e72;
            --border-radius: 15px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Navbar Enhanced */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.3);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            position: relative;
            transition: var(--transition);
            margin: 0 0.5rem;
        }

        .nav-link:hover {
            color: #fff !important;
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: rgba(255, 255, 255, 0.8);
            transition: var(--transition);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 50%, var(--accent-color) 100%);
            color: white;
            padding: 10rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            animation: slideInDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            animation: slideInUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            opacity: 0.95;
            font-weight: 300;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Buttons Enhanced */
        .btn {
            border-radius: var(--border-radius);
            border: none;
            font-weight: 600;
            padding: 0.75rem 2rem;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.6);
            color: white;
        }

        .btn-light {
            background: white;
            color: var(--primary-color);
            font-weight: 700;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-light:hover {
            background: #f8f9fa;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            color: var(--secondary-color);
        }

        /* Section Styles */
        section {
            padding: 5rem 0;
            position: relative;
        }

        section h2 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Cards Enhanced */
        .card {
            border: none;
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            background: white;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            color: white;
            padding: 1.5rem;
            font-weight: 700;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .card-text {
            color: var(--text-light);
            line-height: 1.8;
        }

        .card-footer {
            background: transparent;
            border-top: 1px solid #e9ecef;
            padding: 1.5rem;
        }

        /* About Section */
        #about {
            background: white;
        }

        .about-item {
            text-align: center;
            animation: fadeInUp 0.8s ease forwards;
        }

        .about-item:nth-child(1) { animation-delay: 0.1s; }
        .about-item:nth-child(2) { animation-delay: 0.2s; }
        .about-item:nth-child(3) { animation-delay: 0.3s; }

        .about-item .card-body {
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .about-item .card-title {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        /* Projects Section */
        #projects, #featured-projects {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .project-card {
            position: relative;
            overflow: hidden;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: var(--transition);
            z-index: 1;
        }

        .project-card:hover::before {
            left: 100%;
        }

        .badge {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 0.5rem;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }

        /* Contact Section */
        #contact {
            background: white;
        }

        .form-control {
            border-radius: var(--border-radius);
            border: 2px solid #e9ecef;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            transition: var(--transition);
            background: #f8f9fa;
        }

        .form-control:focus {
            background: white;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.3rem rgba(102, 126, 234, 0.25);
            color: var(--text-dark);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #2a2a3e 100%);
            color: white;
            padding: 3rem 0 1rem;
            border-top: 3px solid var(--primary-color);
        }

        footer p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1.5rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            margin: 0 0.5rem;
            transition: var(--transition);
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .hero {
                padding: 5rem 0;
            }

            section h2 {
                font-size: 2rem;
            }

            .navbar-brand {
                font-size: 1.4rem;
            }

            .btn {
                padding: 0.6rem 1.5rem;
                font-size: 0.8rem;
            }
        }

        /* Utilities */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .shadow-sm-custom {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Alert Custom */
        .alert {
            border-radius: var(--border-radius);
            border: none;
            animation: slideInDown 0.5s ease;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .alert-info {
            background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
            color: #0c5460;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('portfolio.index') }}">
                <i class="fas fa-laptop-code me-2"></i>MyPortfolio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.index') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.projects') }}">
                            <i class="fas fa-briefcase me-1"></i>Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.contact') }}">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-laptop-code me-2"></i>MyPortfolio
                    </h5>
                    <p>Showcasing my best work and creative projects.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('portfolio.index') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.8);">Home</a></li>
                        <li><a href="{{ route('portfolio.projects') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.8);">Projects</a></li>
                        <li><a href="{{ route('portfolio.contact') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.8);">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold mb-3">Follow Me</h6>
                    <div class="social-links">
                        <a href="#" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" title="GitHub"><i class="fab fa-github"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center py-3">
                <p class="mb-0">&copy; 2025 My Portfolio. All rights reserved. <span class="text-primary">•</span> Designed with <i class="fas fa-heart text-danger"></i> by Developer</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .about-item').forEach(el => {
            observer.observe(el);
        });

        // Add CSRF token to all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>
</html>
