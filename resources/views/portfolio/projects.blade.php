@extends('layout')

@section('title', 'Projects')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="text-center mb-5 fw-bold">My Projects</h1>
        
        @if($projects->count() > 0)
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">{{ $project->title }}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">{{ $project->title }}</h6>
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                    <div class="card-footer bg-white">
                        @foreach(explode(',', $project->technologies ?? '') as $tech)
                            @if(trim($tech))
                                <span class="badge bg-primary">{{ trim($tech) }}</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body">
                        <a href="{{ route('portfolio.show', $project) }}" class="btn btn-primary btn-sm">View Details</a>
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="btn btn-outline-primary btn-sm">Visit Site</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info text-center">
            <p>No projects available yet. Check back soon!</p>
        </div>
        @endif
    </div>
</section>
@endsection
