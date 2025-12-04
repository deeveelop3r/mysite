@extends('admin.layout')

@section('title', $project->title)

@section('content')
<div class="topbar">
    <div class="topbar-title">
        <h2><i class="fas fa-briefcase me-2"></i>{{ $project->title }}</h2>
    </div>
    <div class="topbar-actions">
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">
            <i class="fas fa-pencil-alt me-2"></i>Edit
        </a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Project Details Card -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-file-alt me-2"></i>Project Information
            </div>
            <div class="card-body">
                <!-- Title -->
                <div class="mb-4">
                    <h5 class="text-muted"><i class="fas fa-heading me-2"></i>Title</h5>
                    <p class="mb-0">{{ $project->title }}</p>
                </div>

                <!-- Short Description -->
                <div class="mb-4">
                    <h5 class="text-muted"><i class="fas fa-align-left me-2"></i>Short Description</h5>
                    <p class="mb-0">{{ $project->description }}</p>
                </div>

                <!-- Long Description -->
                @if($project->long_description)
                <div class="mb-4">
                    <h5 class="text-muted"><i class="fas fa-book me-2"></i>Detailed Description</h5>
                    <div class="project-description">
                        {{ nl2br(e($project->long_description)) }}
                    </div>
                </div>
                @endif

                <!-- Technologies -->
                <div class="mb-4">
                    <h5 class="text-muted"><i class="fas fa-code me-2"></i>Technologies</h5>
                    <div class="tech-badges">
                        @foreach(explode(',', $project->technologies) as $tech)
                            <span class="badge bg-primary">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Card -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-image me-2"></i>Project Image
            </div>
            <div class="card-body">
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                <p class="text-muted mt-2"><small>{{ $project->image_url }}</small></p>
            </div>
        </div>

        <!-- Links Card -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-link me-2"></i>Project Links
            </div>
            <div class="card-body">
                <div class="row">
                    @if($project->project_url)
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted"><i class="fas fa-globe me-2"></i>Live Project</h6>
                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fas fa-external-link-alt me-2"></i>Visit Project
                        </a>
                    </div>
                    @else
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted"><i class="fas fa-globe me-2"></i>Live Project</h6>
                        <p class="text-muted"><small>No URL provided</small></p>
                    </div>
                    @endif

                    @if($project->github_url)
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted"><i class="fab fa-github me-2"></i>GitHub Repository</h6>
                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-sm btn-dark">
                            <i class="fab fa-github me-2"></i>View Repo
                        </a>
                    </div>
                    @else
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted"><i class="fab fa-github me-2"></i>GitHub Repository</h6>
                        <p class="text-muted"><small>No URL provided</small></p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Status Card -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info-circle me-2"></i>Status
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted">Featured</h6>
                    @if($project->featured)
                        <span class="badge bg-success">
                            <i class="fas fa-star me-1"></i>Featured
                        </span>
                    @else
                        <span class="badge bg-warning">
                            <i class="fas fa-circle me-1"></i>Draft
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Metadata Card -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-clock me-2"></i>Timeline
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted">Created</h6>
                    <p class="mb-0">
                        <small>{{ $project->created_at->format('M d, Y') }}</small><br>
                        <small class="text-muted">{{ $project->created_at->format('H:i A') }}</small>
                    </p>
                </div>
                <div>
                    <h6 class="text-muted">Last Updated</h6>
                    <p class="mb-0">
                        <small>{{ $project->updated_at->format('M d, Y') }}</small><br>
                        <small class="text-muted">{{ $project->updated_at->format('H:i A') }}</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Actions Card -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-cogs me-2"></i>Actions
            </div>
            <div class="card-body">
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary w-100 mb-2">
                    <i class="fas fa-pencil-alt me-2"></i>Edit Project
                </a>
                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash me-2"></i>Delete Project
                </button>
            </div>
        </div>
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
                <p class="text-danger mb-0"><small><i class="fas fa-exclamation-triangle me-1"></i>This action cannot be undone.</small></p>
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
.tech-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.badge {
    padding: 6px 12px;
    font-size: 0.85rem;
    font-weight: 500;
}

.project-description {
    line-height: 1.8;
    color: #c0c0c0;
    white-space: pre-wrap;
    word-wrap: break-word;
}

.btn-sm {
    font-size: 0.85rem;
}
</style>
@endsection
