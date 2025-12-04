@extends('admin.layout')

@section('title', 'Admin Login')

@section('content')
<style>
    .admin-login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .admin-wrapper {
        display: block !important;
    }

    .sidebar {
        display: none !important;
    }

    .main-content {
        margin-left: 0 !important;
        width: 100% !important;
        padding: 0 !important;
        background: transparent !important;
    }

    .login-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        padding: 3rem;
        width: 100%;
        max-width: 400px;
    }

    .login-card h2 {
        text-align: center;
        color: #2d3436;
        margin-bottom: 0.5rem;
        font-weight: 700;
        font-size: 1.8rem;
    }

    .login-card p {
        text-align: center;
        color: #636e72;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .login-icon {
        text-align: center;
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 1.5rem;
    }
</style>

<div class="admin-login-container">
    <div class="login-card">
        <div class="login-icon">
            <i class="fas fa-lock"></i>
        </div>

        <h2>Admin Access</h2>
        <p>Enter your password to access the admin panel</p>

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-key me-2"></i>Admin Password
                </label>
                <input 
                    type="password" 
                    class="form-control form-control-lg" 
                    id="password" 
                    name="password" 
                    placeholder="Enter admin password"
                    required
                    autofocus
                >
                <small class="text-muted d-block mt-2">
                    <i class="fas fa-info-circle me-1"></i>
                    Default password: <code>admin123</code>
                </small>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
        </form>

        <div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #e9ecef; text-align: center;">
            <a href="{{ route('portfolio.index') }}" class="text-decoration-none" style="color: #667eea;">
                <i class="fas fa-arrow-left me-1"></i>Back to Portfolio
            </a>
        </div>
    </div>
</div>
@endsection
