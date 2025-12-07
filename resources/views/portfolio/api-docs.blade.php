@extends('layout')

@section('title', 'API Documentation')

@section('content')
<div style="padding-top: 2rem; padding-bottom: 3rem;">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem;">API Documentation</h1>

        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-body">
                <h3 class="card-title">Base URL</h3>
                <code style="background: rgba(255, 255, 255, 0.05); padding: 0.5rem 1rem; border-radius: 0.5rem;">
                    /api/v1
                </code>
            </div>
        </div>

        <!-- List Projects -->
        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
                <h4 class="card-title">List All Projects</h4>
            </div>
            <div class="card-body">
                <p><strong>Endpoint:</strong> <code>GET /api/v1/projects</code></p>
                <p><strong>Description:</strong> Retrieve paginated list of all projects</p>
                
                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Query Parameters:</h6>
                <ul style="margin-left: 2rem;">
                    <li><code>featured=1</code> - Filter only featured projects</li>
                    <li><code>tech=Laravel</code> - Filter by technology</li>
                    <li><code>page=1</code> - Page number (default: 1)</li>
                </ul>

                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Example Request:</h6>
                <code style="display: block; background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem; overflow-x: auto;">
GET /api/v1/projects?featured=1&page=1
                </code>

                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Response:</h6>
                <pre style="background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem; overflow-x: auto;"><code>{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Project Name",
      "description": "Short description",
      "long_description": "Detailed description",
      "technologies": "Laravel, Vue.js, Bootstrap",
      "image_url": "https://...",
      "project_url": "https://...",
      "github_url": "https://...",
      "featured": true,
      "created_at": "2024-01-01T00:00:00Z",
      "updated_at": "2024-01-01T00:00:00Z"
    }
  ],
  "pagination": {
    "current_page": 1,
    "total": 5,
    "per_page": 12,
    "last_page": 1
  }
}</code></pre>
            </div>
        </div>

        <!-- Get Featured Projects -->
        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
                <h4 class="card-title">Get Featured Projects</h4>
            </div>
            <div class="card-body">
                <p><strong>Endpoint:</strong> <code>GET /api/v1/projects/featured</code></p>
                <p><strong>Description:</strong> Retrieve only featured projects</p>
                
                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Example Request:</h6>
                <code style="display: block; background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem;">
GET /api/v1/projects/featured
                </code>
            </div>
        </div>

        <!-- Get Single Project -->
        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
                <h4 class="card-title">Get Single Project</h4>
            </div>
            <div class="card-body">
                <p><strong>Endpoint:</strong> <code>GET /api/v1/projects/{id}</code></p>
                <p><strong>Description:</strong> Retrieve details of a specific project</p>
                
                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Path Parameters:</h6>
                <ul style="margin-left: 2rem;">
                    <li><code>id</code> - Project ID (required)</li>
                </ul>

                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Example Request:</h6>
                <code style="display: block; background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem;">
GET /api/v1/projects/1
                </code>
            </div>
        </div>

        <!-- Projects by Technology -->
        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
                <h4 class="card-title">Get Projects by Technology</h4>
            </div>
            <div class="card-body">
                <p><strong>Endpoint:</strong> <code>GET /api/v1/projects/technology/{tech}</code></p>
                <p><strong>Description:</strong> Retrieve all projects using a specific technology</p>
                
                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Path Parameters:</h6>
                <ul style="margin-left: 2rem;">
                    <li><code>tech</code> - Technology name (e.g., "Laravel", "Vue.js")</li>
                </ul>

                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Example Request:</h6>
                <code style="display: block; background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem;">
GET /api/v1/projects/technology/Laravel
                </code>
            </div>
        </div>

        <!-- Portfolio Statistics -->
        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
                <h4 class="card-title">Get Portfolio Statistics</h4>
            </div>
            <div class="card-body">
                <p><strong>Endpoint:</strong> <code>GET /api/v1/stats</code></p>
                <p><strong>Description:</strong> Retrieve portfolio statistics including project counts and technologies</p>
                
                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Example Request:</h6>
                <code style="display: block; background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem;">
GET /api/v1/stats
                </code>

                <h6 style="margin-top: 1rem; margin-bottom: 0.5rem;">Response:</h6>
                <pre style="background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem;"><code>{
  "success": true,
  "data": {
    "total_projects": 5,
    "featured_projects": 3,
    "technologies": [
      "Laravel",
      "Vue.js",
      "Bootstrap",
      "PostgreSQL"
    ]
  }
}</code></pre>
            </div>
        </div>

        <!-- Usage Examples -->
        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
                <h4 class="card-title">JavaScript Example</h4>
            </div>
            <div class="card-body">
                <pre style="background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 0.5rem; overflow-x: auto;"><code>// Fetch featured projects
fetch('/api/v1/projects/featured')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));

// Fetch projects by technology
fetch('/api/v1/projects/technology/Laravel')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));

// Get portfolio statistics
fetch('/api/v1/stats')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));</code></pre>
            </div>
        </div>

        <!-- Response Codes -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">HTTP Status Codes</h4>
            </div>
            <div class="card-body">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Meaning</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>200</strong></td>
                            <td>OK - Request successful</td>
                        </tr>
                        <tr>
                            <td><strong>404</strong></td>
                            <td>Not Found - Resource not found</td>
                        </tr>
                        <tr>
                            <td><strong>500</strong></td>
                            <td>Server Error - Internal server error</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
