# MyPortfolio - Professional Portfolio Website

A modern, fully-featured portfolio website built with Laravel 10, featuring a public showcase and admin panel for project management.

## Features

### 🎨 Public Portfolio
- **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- **Modern UI/UX**: Gradient backgrounds, smooth animations, and professional styling
- **Project Showcase**: Display your best projects with descriptions and technologies
- **Project Details**: In-depth project pages with links to live demo and source code
- **Contact Form**: Get in touch functionality with validation and rate limiting
- **Featured Projects**: Highlight your best work on the homepage

### 🔐 Admin Panel
- **Project Management**: Create, read, update, and delete projects
- **Authentication**: Password-protected admin area
- **Project Details**: Manage titles, descriptions, technologies, images, and links
- **Featured Toggle**: Mark projects as featured for homepage display
- **Search & Pagination**: Easily navigate through your projects

### 🛡️ Security
- **CSRF Protection**: Built-in form protection
- **Input Validation**: Server-side and client-side validation
- **Rate Limiting**: Prevent contact form abuse
- **Security Headers**: XSS protection, clickjacking prevention, CSP policies
- **HTML Sanitization**: Prevent injection attacks

## Quick Start

### Requirements
- PHP 8.1 or higher
- Composer
- SQLite (included)

### Installation

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=ProjectSeeder
   ```

4. **Start Development Server**
   ```bash
   php artisan serve
   ```
   Server will run at `http://localhost:8000`

## Usage

### Public Portfolio
- **Homepage**: `http://localhost:8000/`
- **Projects Gallery**: `http://localhost:8000/projects`
- **Project Details**: `http://localhost:8000/projects/{id}`
- **Contact**: `http://localhost:8000/contact`

### Admin Panel
- **Login**: `http://localhost:8000/admin/login`
- **Projects Dashboard**: `http://localhost:8000/admin/projects` (after login)
- **Default Password**: `admin123`

## Configuration

### Change Admin Password
Edit `.env` file:
```env
ADMIN_PASSWORD=your_new_password
```

### Database
SQLite database is stored at:
```
database/portfolio.sqlite
```

For production, configure a different database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── PortfolioController.php      (Public pages)
│   │   └── Admin/
│   │       ├── ProjectController.php    (Admin CRUD)
│   │       └── AuthController.php       (Admin login)
│   └── Middleware/
│       ├── SecurityHeaders.php          (Security)
│       └── AdminMiddleware.php          (Admin auth)
└── Models/
    └── Project.php

resources/views/
├── portfolio/                           (Public pages)
│   ├── index.blade.php
│   ├── projects.blade.php
│   ├── show.blade.php
│   └── contact.blade.php
├── admin/                               (Admin panel)
│   ├── layout.blade.php
│   ├── login.blade.php
│   └── projects/
│       ├── index.blade.php
│       ├── create.blade.php
│       ├── edit.blade.php
│       └── show.blade.php
└── layout.blade.php                     (Base layout)

routes/
└── web.php                              (All routes)

database/
├── migrations/                          (Database schema)
└── seeders/                             (Sample data)
```

## Database Schema

### Projects Table
| Column | Type | Description |
|--------|------|-------------|
| id | BIGINT | Primary key |
| title | VARCHAR(255) | Project title (unique) |
| description | VARCHAR(500) | Short description |
| long_description | LONGTEXT | Detailed description |
| technologies | TEXT | Comma-separated tech stack |
| image_url | TEXT | Project image URL |
| project_url | TEXT | Live project URL |
| github_url | TEXT | GitHub repository URL |
| featured | BOOLEAN | Show on homepage |
| created_at | TIMESTAMP | Creation timestamp |
| updated_at | TIMESTAMP | Last update timestamp |

## Validation Rules

### Create/Update Project
- **Title**: Required, max 255 chars, must be unique
- **Description**: Required, max 500 chars
- **Long Description**: Optional, unlimited length
- **Technologies**: Optional, comma-separated list
- **Image URL**: Required, must be valid image URL
- **Project URL**: Optional, must be valid URL
- **GitHub URL**: Optional, must be valid URL
- **Featured**: Optional, boolean toggle

### Contact Form
- **Name**: Required, min 2 chars, max 255 chars
- **Email**: Required, must be valid email
- **Subject**: Required, min 5 chars, max 255 chars
- **Message**: Required, min 10 chars, max 5000 chars

## Security Features

### Implemented
✅ CSRF token protection  
✅ XSS prevention  
✅ HSTS headers  
✅ Content Security Policy  
✅ X-Frame-Options protection  
✅ Rate limiting on contact form  
✅ Input validation and sanitization  
✅ Session-based admin authentication  
✅ Secure password comparison  

## Development

### Creating a New Migration
```bash
php artisan make:migration create_projects_table
```

### Creating a New Model
```bash
php artisan make:model Project
```

### Creating a New Controller
```bash
php artisan make:controller ProjectController --resource
```

### Running Tests
```bash
php artisan test
```

## Deployment

### Environment
Create `.env.production`:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
ADMIN_PASSWORD=change_this_strong_password
```

### Steps
1. Install dependencies: `composer install --no-dev`
2. Copy `.env.production` to `.env`
3. Generate key: `php artisan key:generate`
4. Run migrations: `php artisan migrate --force`
5. Clear cache: `php artisan cache:clear`

## Performance Tips

1. **Caching**: Enable query caching for production
2. **Image Optimization**: Optimize images before uploading
3. **CDN**: Use CDN for static assets
4. **Database Indexing**: Index frequently searched columns
5. **Compression**: Enable gzip compression

## Troubleshooting

### Database Connection Error
- Check `.env` file for correct database path
- Ensure `database/portfolio.sqlite` file exists
- Run migrations: `php artisan migrate`

### Admin Login Issues
- Default password is `admin123`
- Check `.env` for `ADMIN_PASSWORD` setting
- Clear cache: `php artisan cache:clear`

### 404 Errors
- Clear cache: `php artisan cache:clear`
- Verify routes: `php artisan route:list`

### Validation Errors
- Check error messages in browser
- Verify form data matches validation rules
- Check server logs: `storage/logs/laravel.log`

## Documentation

For detailed documentation, see:
- [Admin Panel Guide](ADMIN_PANEL_DOCUMENTATION.md)
- [Laravel Documentation](https://laravel.com/docs)

## License

This project is open-source software licensed under the MIT license.

## Support

For issues or questions, please refer to the troubleshooting section or check the logs.

---

**Version**: 1.0.0  
**Last Updated**: 2025-12-04
