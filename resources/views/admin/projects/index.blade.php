@extends('admin.layout')

@section('title', 'Projects Management')

@section('content')
<div class="topbar">
    <div class="topbar-title">
        <h2><i class="fas fa-briefcase me-2"></i>Projects</h2>
    </div>
    <div class="topbar-actions">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Project
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-list me-2"></i>Project List
    </div>
    <div class="card-body">
        @if($projects->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Technologies</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>
                            <strong>{{ $project->title }}</strong>
                        </td>
                        <td>
                            {{ Str::limit($project->description, 50) }}
                        </td>
                        <td>
                            @if($project->technologies)
                                <small>
                                    @foreach(explode(',', $project->technologies) as $tech)
                                        @if($loop->index < 2)
                                            <span class="badge bg-info">{{ trim($tech) }}</span>
                                        @endif
                                    @endforeach
                                    @if(count(explode(',', $project->technologies)) > 2)
                                        <span class="badge bg-secondary">+{{ count(explode(',', $project->technologies)) - 2 }}</span>
                                    @endif
                                </small>
                            @endif
                        </td>
                        <td>
                            @if($project->featured)
                                <span class="badge badge-success">Featured</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $project->created_at->format('M d, Y') }}</small>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info" style="color: white;" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            {{ $projects->links('pagination::bootstrap-4') }}
        </nav>
        @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            No projects found. <a href="{{ route('admin.projects.create') }}">Create your first project</a>
        </div>
        @endif
    </div>
</div>
@endsection
