@extends('layout')

@section('title', 'Portfolio - Home')

@section('content')
<header class="hero">
    <div class="container hero-content">
        <h1 style="animation: fadeInUp 1s ease-out;">Welcome to My Portfolio</h1>
        <p style="animation: fadeInUp 1.2s ease-out;">I'm a passionate developer creating amazing digital experiences</p>
        <a href="{{ route('portfolio.projects') }}" class="btn btn-light btn-lg mt-4" style="animation: fadeInUp 1.4s ease-out;">
            <i class="fas fa-arrow-right me-2"></i>View My Work
        </a>
    </div>
</header>

<section id="about" class="py-5">
    <div class="container">
        <h2 class="mb-2">About Me</h2>
        <p class="section-subtitle">Full-stack developer with 5+ years of experience building robust, scalable web applications. Specialized in Laravel, Vue.js, and modern cloud deployment. Passionate about clean code and user-centered design.</p>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center" style="padding: 2rem;">
                        <div style="font-size: 3rem; margin-bottom: 1rem; animation: slideInLeft 0.6s ease-out;">
                            <i class="fas fa-paint-brush" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        </div>
                        <h5 class="card-title">Frontend Design</h5>
                        <p class="card-text">Crafting pixel-perfect, responsive interfaces with modern UI frameworks like Bootstrap, Tailwind, and Vue.js.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center" style="padding: 2rem;">
                        <div style="font-size: 3rem; margin-bottom: 1rem; animation: slideInLeft 0.8s ease-out;">
                            <i class="fas fa-code" style="background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        </div>
                        <h5 class="card-title">Backend Development</h5>
                        <p class="card-text">Building scalable APIs and server applications with Laravel, Node.js, and modern cloud architectures.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center" style="padding: 2rem;">
                        <div style="font-size: 3rem; margin-bottom: 1rem; animation: slideInLeft 1s ease-out;">
                            <i class="fas fa-rocket" style="background: linear-gradient(135deg, var(--accent-color), var(--primary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        </div>
                        <h5 class="card-title">DevOps & Deployment</h5>
                        <p class="card-text">Deploying applications to Railway, Vercel, and cloud platforms with CI/CD pipelines and monitoring.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($projects->count() > 0)
<section id="featured-projects" class="py-5">
    <div class="container">
        <h2 class="mb-2">Featured Projects</h2>
        <p class="section-subtitle">A selection of my best work showcasing different technologies and approaches</p>
        
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-folder-open me-2"></i>{{ $project->title }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        @foreach(explode(',', $project->technologies ?? '') as $tech)
                            @if(trim($tech))
                                <span class="badge">{{ trim($tech) }}</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body border-top">
                        <a href="{{ route('portfolio.show', $project) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Project
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('portfolio.projects') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-th me-2"></i>View All Projects
            </a>
        </div>
    </div>
</section>
@endif

<section id="cta" class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center" style="color: white;">
        <h2 class="mb-4" style="color: white; background: none; -webkit-text-fill-color: unset;">Ready to work together?</h2>
        <p class="mb-4" style="font-size: 1.2rem; opacity: 0.95;">Let's create something amazing together!</p>
        <a href="{{ route('portfolio.contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-paper-plane me-2"></i>Get In Touch
        </a>
    </div>
</section>
@endsection
