<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'E-Commerce Platform',
            'description' => 'A fully functional e-commerce website with shopping cart and payment integration.',
            'long_description' => 'A comprehensive e-commerce platform built with modern technologies, featuring a shopping cart system, payment gateway integration, user authentication, product management, and order tracking. The platform supports multiple payment methods and real-time inventory management.',
            'technologies' => 'HTML, CSS, JavaScript, Laravel, MySQL',
            'image_url' => 'https://via.placeholder.com/400x300?text=E-Commerce',
            'project_url' => 'https://example.com/ecommerce',
            'github_url' => 'https://github.com/example/ecommerce',
            'featured' => true,
        ]);

        Project::create([
            'title' => 'Task Management App',
            'description' => 'A responsive task management application with real-time updates.',
            'long_description' => 'A sleek task management application that allows users to organize their daily tasks efficiently. Features include real-time updates, task categorization, priority levels, due date tracking, and collaborative features for team projects.',
            'technologies' => 'React, Firebase, Tailwind CSS, JavaScript',
            'image_url' => 'https://via.placeholder.com/400x300?text=Task+Manager',
            'project_url' => 'https://example.com/tasks',
            'github_url' => 'https://github.com/example/task-manager',
            'featured' => true,
        ]);

        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'A sleek portfolio website with smooth animations and modern design.',
            'long_description' => 'This portfolio website showcases projects and skills with smooth animations and a clean, modern design aesthetic. Built with Laravel, Bootstrap, and custom CSS animations to provide an engaging user experience.',
            'technologies' => 'Laravel, Bootstrap, CSS, JavaScript',
            'image_url' => 'https://via.placeholder.com/400x300?text=Portfolio',
            'project_url' => null,
            'github_url' => 'https://github.com/example/portfolio',
            'featured' => true,
        ]);

        Project::create([
            'title' => 'Blog Platform',
            'description' => 'A content management system for publishing and managing blog posts.',
            'long_description' => 'A feature-rich blog platform with markdown support, comment system, category management, and SEO optimization. Includes admin dashboard for content management and user engagement analytics.',
            'technologies' => 'Laravel, Vue.js, PostgreSQL, Markdown',
            'image_url' => 'https://via.placeholder.com/400x300?text=Blog+Platform',
            'project_url' => 'https://example.com/blog',
            'github_url' => 'https://github.com/example/blog',
            'featured' => false,
        ]);

        Project::create([
            'title' => 'Weather App',
            'description' => 'A real-time weather application with location-based forecasts.',
            'long_description' => 'An interactive weather application that provides real-time weather data, forecasts, and alerts. Features include location detection, multiple location support, detailed weather metrics, and beautiful data visualization.',
            'technologies' => 'React, API Integration, Chart.js, Axios',
            'image_url' => 'https://via.placeholder.com/400x300?text=Weather+App',
            'project_url' => 'https://example.com/weather',
            'github_url' => 'https://github.com/example/weather',
            'featured' => false,
        ]);
    }
}
