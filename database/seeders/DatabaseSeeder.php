<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed sample projects
        \App\Models\Project::insert([
            [
                'title' => 'E-Commerce Platform',
                'description' => 'Full-stack e-commerce solution',
                'long_description' => 'A complete e-commerce platform built with Laravel and Vue.js, featuring product management, shopping cart, payment integration, and order tracking.',
                'technologies' => 'Laravel,Vue.js,PostgreSQL,Stripe',
                'image_url' => 'https://images.unsplash.com/photo-1557821552-17105176677c?w=400&h=300&fit=crop',
                'project_url' => 'https://example-ecommerce.com',
                'github_url' => 'https://github.com/yourusername/ecommerce',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Task Management App',
                'description' => 'Collaborative task and project management tool',
                'long_description' => 'A real-time task management application with team collaboration features, built with React and Node.js.',
                'technologies' => 'React,Node.js,MongoDB,WebSocket',
                'image_url' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=300&fit=crop',
                'project_url' => 'https://example-tasks.com',
                'github_url' => 'https://github.com/yourusername/task-app',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Analytics Dashboard',
                'description' => 'Real-time analytics and data visualization platform',
                'long_description' => 'Enterprise analytics dashboard with real-time data visualization, custom reports, and predictive analytics.',
                'technologies' => 'Laravel,Vue.js,PostgreSQL,Chart.js',
                'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop',
                'project_url' => 'https://example-analytics.com',
                'github_url' => 'https://github.com/yourusername/analytics',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Social Media Feed',
                'description' => 'Social networking platform with real-time updates',
                'long_description' => 'A social media platform with user profiles, post feeds, real-time notifications, and messaging features.',
                'technologies' => 'React Native,Node.js,Firebase,PostgreSQL',
                'image_url' => 'https://images.unsplash.com/photo-1611606063065-ab69f1009c5f?w=400&h=300&fit=crop',
                'project_url' => 'https://example-social.com',
                'github_url' => 'https://github.com/yourusername/social-app',
                'featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'API Documentation Generator',
                'description' => 'Automatic API documentation from code annotations',
                'long_description' => 'Tool for automatically generating beautiful API documentation from source code annotations and comments.',
                'technologies' => 'PHP,Laravel,Vue.js,OpenAPI',
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop',
                'project_url' => 'https://example-apidoc.com',
                'github_url' => 'https://github.com/yourusername/api-doc-gen',
                'featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
