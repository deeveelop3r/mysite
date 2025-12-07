@extends('layout')

@section('title', 'Skills & Technologies')

@section('content')
<div style="padding-top: 2rem;">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 1rem;">Skills & Technologies</h1>
        <p class="section-subtitle" style="text-align: center; margin-bottom: 3rem;">A comprehensive overview of technologies and skills used in my projects</p>

        <!-- Frontend -->
        <section class="py-5">
            <h2><i class="fas fa-desktop me-2" style="color: var(--primary-color);"></i>Frontend Development</h2>
            <div class="row g-4" style="margin-top: 2rem;">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Vue.js 3</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: 90%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Reactive UI components and SPA development</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bootstrap 5</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: 85%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Responsive design and UI components</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Tailwind CSS</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: 80%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Utility-first CSS framework</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">JavaScript/TypeScript</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: 88%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Modern ES6+ and TypeScript</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">REST APIs</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: 92%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">API integration and consumption</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">HTML5/CSS3</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: 95%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Semantic HTML and modern CSS</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Backend -->
        <section class="py-5">
            <h2><i class="fas fa-server me-2" style="color: var(--secondary-color);"></i>Backend Development</h2>
            <div class="row g-4" style="margin-top: 2rem;">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Laravel 10</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--secondary-color), var(--accent-color)); width: 95%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">PHP web framework and Eloquent ORM</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">PHP 8.2+</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--secondary-color), var(--accent-color)); width: 90%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Modern PHP with typed properties</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">MySQL/PostgreSQL</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--secondary-color), var(--accent-color)); width: 88%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Database design and optimization</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Node.js</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--secondary-color), var(--accent-color)); width: 75%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">JavaScript backend and Express.js</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">API Development</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--secondary-color), var(--accent-color)); width: 92%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">RESTful and GraphQL APIs</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Authentication</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--secondary-color), var(--accent-color)); width: 85%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">JWT, OAuth, Session management</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DevOps & Tools -->
        <section class="py-5">
            <h2><i class="fas fa-tools me-2" style="color: var(--accent-color);"></i>DevOps & Tools</h2>
            <div class="row g-4" style="margin-top: 2rem;">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Git & GitHub</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--accent-color), var(--primary-color)); width: 95%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Version control and collaboration</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Docker</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--accent-color), var(--primary-color)); width: 78%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Containerization and deployment</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Railway/Vercel</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--accent-color), var(--primary-color)); width: 90%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Cloud deployment platforms</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">VS Code</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--accent-color), var(--primary-color)); width: 92%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Primary development environment</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Linux/Bash</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--accent-color), var(--primary-color)); width: 80%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Server management and scripting</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">CI/CD Pipelines</h5>
                            <div class="mb-3">
                                <div style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; height: 8px; overflow: hidden;">
                                    <div style="background: linear-gradient(90deg, var(--accent-color), var(--primary-color)); width: 75%; height: 100%;"></div>
                                </div>
                            </div>
                            <p class="text-muted">Automated testing and deployment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- API Documentation Link -->
        <section class="py-5" style="text-align: center;">
            <div class="card" style="max-width: 600px; margin: 0 auto;">
                <div class="card-body" style="padding: 3rem;">
                    <i class="fas fa-code" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                    <h3 class="card-title">API Documentation</h3>
                    <p class="card-text">This portfolio includes a RESTful API for programmatic access to projects and statistics.</p>
                    <a href="/api-docs" class="btn btn-primary mt-3">
                        <i class="fas fa-book me-2"></i>View API Docs
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
