@extends('admin.layout')

@section('title', 'Edit Project')

@section('content')
<div class="topbar">
    <div class="topbar-title">
        <h2><i class="fas fa-pencil-alt me-2"></i>Edit Project</h2>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-pencil-alt me-2"></i>{{ $project->title }}
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

        <form method="POST" action="{{ route('admin.projects.update', $project) }}" novalidate>
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label"><i class="fas fa-heading me-2"></i>Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label"><i class="fas fa-align-left me-2"></i>Short Description <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
                <small class="form-text text-muted">Brief overview of the project</small>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Long Description -->
            <div class="mb-3">
                <label for="long_description" class="form-label"><i class="fas fa-file-alt me-2"></i>Detailed Description</label>
                <textarea class="form-control @error('long_description') is-invalid @enderror" id="long_description" name="long_description" rows="5">{{ old('long_description', $project->long_description) }}</textarea>
                <small class="form-text text-muted">Complete description including challenges, solutions, and outcomes</small>
                @error('long_description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Technologies -->
            <div class="mb-3">
                <label for="technologies" class="form-label"><i class="fas fa-code me-2"></i>Technologies <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies) }}" placeholder="PHP, Laravel, MySQL, Bootstrap" required>
                <small class="form-text text-muted">Comma-separated list of technologies used</small>
                @error('technologies')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Image URL -->
                <div class="col-md-6 mb-3">
                    <label for="image_url" class="form-label"><i class="fas fa-image me-2"></i>Image URL <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $project->image_url) }}" required>
                    <small class="form-text text-muted">Project thumbnail image URL</small>
                    @error('image_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Project URL -->
                <div class="col-md-6 mb-3">
                    <label for="project_url" class="form-label"><i class="fas fa-link me-2"></i>Project URL</label>
                    <input type="url" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" value="{{ old('project_url', $project->project_url) }}">
                    <small class="form-text text-muted">Live project URL</small>
                    @error('project_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- GitHub URL -->
                <div class="col-md-6 mb-3">
                    <label for="github_url" class="form-label"><i class="fab fa-github me-2"></i>GitHub URL</label>
                    <input type="url" class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
                    <small class="form-text text-muted">Repository URL</small>
                    @error('github_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Featured -->
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="fas fa-star me-2"></i>Featured</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">
                            Mark as featured project
                        </label>
                    </div>
                </div>
            </div>

            <!-- Metadata -->
            <div class="alert alert-info mt-4">
                <i class="fas fa-info-circle me-2"></i>
                <small>
                    <strong>Created:</strong> {{ $project->created_at->format('M d, Y H:i') }} | 
                    <strong>Last Updated:</strong> {{ $project->updated_at->format('M d, Y H:i') }}
                </small>
            </div>

            <!-- Buttons -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Project
                </button>
                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info" style="color: white;">
                    <i class="fas fa-eye me-2"></i>View
                </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash me-2"></i>Delete
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #2a2a2a; border: 1px solid #444;">
            <div class="modal-header" style="border-bottom: 1px solid #444;">
                <h5 class="modal-title"><i class="fas fa-warning me-2"></i>Delete Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: invert(1);"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong>{{ $project->title }}</strong>?</p>
                <p class="text-muted"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #444;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Permanently
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
    flex-wrap: wrap;
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
</style>
@endsection
