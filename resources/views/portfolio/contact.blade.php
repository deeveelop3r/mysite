@extends('layout')

@section('title', 'Contact')

@section('content')
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="mb-2">Get In Touch</h2>
        <p class="section-subtitle">Have a project in mind? I'd love to hear from you!</p>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm-custom">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('portfolio.store-contact') }}" novalidate>
                            @csrf
                            
                            <div class="mb-4">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user me-2"></i>Your Name
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    placeholder="John Doe"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="john@example.com"
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="subject" class="form-label">
                                    <i class="fas fa-heading me-2"></i>Subject
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('subject') is-invalid @enderror" 
                                    id="subject" 
                                    name="subject" 
                                    value="{{ old('subject') }}" 
                                    placeholder="Project Inquiry"
                                    required
                                >
                                @error('subject')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">
                                    <i class="fas fa-comments me-2"></i>Message
                                </label>
                                <textarea 
                                    class="form-control @error('message') is-invalid @enderror" 
                                    id="message" 
                                    name="message" 
                                    rows="5" 
                                    placeholder="Tell me about your project..."
                                    required
                                >{{ old('message') }}</textarea>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>Minimum 10 characters
                                </small>
                                @error('message')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @if($errors->has('rate_limit'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fas fa-clock me-2"></i>
                                {{ $errors->first('rate_limit') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>

                            <div class="mt-3 text-center text-muted small">
                                <i class="fas fa-shield-alt me-1"></i>
                                Your information is secure and will never be shared.
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="row g-3 mt-5">
                    <div class="col-md-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt" style="font-size: 2rem; color: var(--primary-color);"></i>
                        </div>
                        <h6 class="fw-bold">Location</h6>
                        <p class="text-muted small">Your City, Country</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-envelope-open" style="font-size: 2rem; color: var(--primary-color);"></i>
                        </div>
                        <h6 class="fw-bold">Email</h6>
                        <p class="text-muted small"><a href="mailto:hello@example.com" class="text-decoration-none">hello@example.com</a></p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-phone" style="font-size: 2rem; color: var(--primary-color);"></i>
                        </div>
                        <h6 class="fw-bold">Phone</h6>
                        <p class="text-muted small"><a href="tel:+1234567890" class="text-decoration-none">+1 (234) 567-890</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Client-side validation
    document.querySelector('form').addEventListener('submit', function(e) {
        // Name validation
        const nameInput = document.getElementById('name');
        if (!/^[a-zA-Z\s'.-]*$/.test(nameInput.value)) {
            e.preventDefault();
            alert('Name contains invalid characters');
            return false;
        }

        // Email validation
        const emailInput = document.getElementById('email');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            e.preventDefault();
            alert('Please enter a valid email address');
            return false;
        }

        // Message length
        const messageInput = document.getElementById('message');
        if (messageInput.value.length < 10) {
            e.preventDefault();
            alert('Message must be at least 10 characters long');
            return false;
        }
    });
</script>
@endsection
