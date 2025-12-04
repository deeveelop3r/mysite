@extends('layout')

@section('title', $project->title)

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-4">{{ $project->title }}</h1>
                
                @if($project->image_url)
                <div class="mb-4">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="img-fluid rounded">
                </div>
                @endif

                <h3 class="mb-3">Project Description</h3>
                <p>{{ $project->long_description ?? $project->description }}</p>

                <h3 class="mb-3 mt-4">Technologies Used</h3>
                <div class="mb-4">
                    @foreach(explode(',', $project->technologies ?? '') as $tech)
                        @if(trim($tech))
                            <span class="badge bg-primary me-2 mb-2">{{ trim($tech) }}</span>
                        @endif
                    @endforeach
                </div>

                <div class="mt-5">
                    @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" class="btn btn-primary btn-lg me-2">Visit Project</a>
                    @endif
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline-primary btn-lg">GitHub Repository</a>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Project Details</h5>
                        <dl class="row">
                            <dt class="col-sm-6">Created:</dt>
                            <dd class="col-sm-6">{{ $project->created_at->format('M d, Y') }}</dd>
                            
                            @if($project->featured)
                            <dt class="col-sm-6">Status:</dt>
                            <dd class="col-sm-6"><span class="badge bg-success">Featured</span></dd>
                            @endif
                        </dl>
                    </div>
                </div>

                <div class="card shadow-sm mt-3">
                    <div class="card-body">
                        <a href="{{ route('portfolio.projects') }}" class="btn btn-outline-primary w-100">Back to Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
