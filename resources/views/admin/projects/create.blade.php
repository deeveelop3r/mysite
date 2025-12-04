@extends('admin.layout')

@section('title', 'Create Project')

@section('content')
<div class="topbar">
    <div class="topbar-title">
        <h2><i class="fas fa-plus me-2"></i>Create New Project</h2>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-pencil-alt me-2"></i>Project Form
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong>Validation Error!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.projects.store') }}" novalidate>
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label"><i class="fas fa-heading me-2"></i>Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label"><i class="fas fa-align-left me-2"></i>Short Description <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                <small class="form-text text-muted">Brief overview of the project</small>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Long Description -->
            <div class="mb-3">
                <label for="long_description" class="form-label"><i class="fas fa-file-alt me-2"></i>Detailed Description</label>
                <textarea class="form-control @error('long_description') is-invalid @enderror" id="long_description" name="long_description" rows="5">{{ old('long_description') }}</textarea>
                <small class="form-text text-muted">Complete description including challenges, solutions, and outcomes</small>
                @error('long_description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Technologies -->
            <div class="mb-3">
                <label for="technologies" class="form-label"><i class="fas fa-code me-2"></i>Technologies <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" value="{{ old('technologies') }}" placeholder="PHP, Laravel, MySQL, Bootstrap" required>
                <small class="form-text text-muted">Comma-separated list of technologies used</small>
                @error('technologies')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Image URL -->
                <div class="col-md-6 mb-3">
                    <label for="image_url" class="form-label"><i class="fas fa-image me-2"></i>Image URL <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url') }}" required>
                    @error('image_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Project URL -->
                <div class="col-md-6 mb-3">
                    <label for="project_url" class="form-label"><i class="fas fa-link me-2"></i>Project URL</label>
                    <input type="url" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" value="{{ old('project_url') }}">
                    @error('project_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- GitHub URL -->
                <div class="col-md-6 mb-3">
                    <label for="github_url" class="form-label"><i class="fab fa-github me-2"></i>GitHub URL</label>
                    <input type="url" class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url') }}">
                    @error('github_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Featured -->
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="fas fa-star me-2"></i>Featured</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">
                            Mark as featured project
                        </label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.form-label {
    font-weight: 600;
    color: #e0e0e0;
    margin-bottom: 8px;
}

.form-control {
    background-color: #2a2a2a;
    border: 1px solid #444;
    color: #e0e0e0;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.form-control:focus {
    background-color: #333;
    border-color: #667eea;
    color: #e0e0e0;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.form-control.is-invalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.btn-group-sm > .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.btn-edit {
    background-color: #667eea;
    color: white;
    border: none;
}

.btn-edit:hover {
    background-color: #5568d3;
    color: white;
}
</style>
@endsection
