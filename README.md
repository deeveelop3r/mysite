# 🎨 MyPortfolio - Professional Portfolio Website

A modern, fully-featured portfolio website built with **Laravel 10**, featuring a beautiful public showcase and secure admin panel for project management.

![Version](https://img.shields.io/badge/Version-1.0.0-blue)
![Laravel](https://img.shields.io/badge/Laravel-10.50.0-red)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.0-purple)
![License](https://img.shields.io/badge/License-MIT-green)

---

## ✨ Features

### 🌐 Public Portfolio
- **Responsive Design** - Works on all devices
- **Modern UI/UX** - Gradient backgrounds and smooth animations
- **Project Showcase** - Display your best work
- **Project Details** - In-depth project information
- **Contact Form** - Visitor engagement with validation
- **Featured Projects** - Highlight top work on homepage

### 🔐 Admin Panel
- **Project Management** - Full CRUD operations
- **Password Protection** - Secure admin access
- **Project Details** - Manage all project information
- **Featured Toggle** - Control homepage display
- **Pagination** - Easy navigation through projects
- **Responsive Layout** - Works on all screen sizes

### 🛡️ Security
- ✅ CSRF Protection
- ✅ Input Validation
- ✅ Rate Limiting
- ✅ Security Headers
- ✅ HTML Sanitization
- ✅ Session Management

---

## 🚀 Quick Start

### Requirements
- PHP 8.1 or higher
- Composer
- SQLite (included)

### Installation

```bash
# 1. Clone repository
git clone https://github.com/YOUR_USERNAME/portfolio-website.git
cd portfolio-website

# 2. Install dependencies
composer install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database
php artisan migrate
php artisan db:seed --class=ProjectSeeder

# 5. Start server
php artisan serve
```

Visit `http://localhost:8000` 🎉

---

## 📖 Usage

### Public Portfolio
- **Homepage**: `http://localhost:8000/`
- **Projects**: `http://localhost:8000/projects`
- **Contact**: `http://localhost:8000/contact`

### Admin Panel
- **Login**: `http://localhost:8000/admin/login`
- **Password**: `admin123` (default)
- **Dashboard**: `http://localhost:8000/admin/projects`

---

## 📁 Project Structure

```
portfolio-website/
├── app/
│   ├── Http/Controllers/
│   │   ├── PortfolioController.php
│   │   └── Admin/
│   │       ├── ProjectController.php
│   │       └── AuthController.php
│   └── Models/
│       └── Project.php
├── resources/views/
│   ├── portfolio/
│   │   ├── index.blade.php
│   │   ├── projects.blade.php
│   │   └── contact.blade.php
│   └── admin/
│       ├── layout.blade.php
│       └── projects/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
├── routes/web.php
├── database/
│   ├── migrations/
│   └── seeders/
└── docs/
    ├── SETUP_GUIDE.md
    ├── ADMIN_PANEL_DOCUMENTATION.md
    └── PORTFOLIO_README.md
```

---

## 🔧 Configuration

Edit `.env` file:

```env
# Application
APP_NAME=MyPortfolio
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database
DB_CONNECTION=sqlite
DB_DATABASE=database/portfolio.sqlite

# Admin
ADMIN_PASSWORD=admin123
```

---

## 📚 Documentation

| File | Description |
|------|-------------|
| [SETUP_GUIDE.md](SETUP_GUIDE.md) | Complete setup and deployment guide |
| [PORTFOLIO_README.md](PORTFOLIO_README.md) | Project overview and installation |
| [ADMIN_PANEL_DOCUMENTATION.md](ADMIN_PANEL_DOCUMENTATION.md) | Admin panel complete guide |
| [ADMIN_PANEL_COMPLETION.md](ADMIN_PANEL_COMPLETION.md) | Completion summary |
| [GITHUB_DEPLOYMENT.md](GITHUB_DEPLOYMENT.md) | GitHub deployment instructions |
| [IMPLEMENTATION_CHECKLIST.md](IMPLEMENTATION_CHECKLIST.md) | Full implementation checklist |

---

## 🎯 Admin Panel Features

### Create Projects
```
Title, Description, Technologies, Image URL, Project URL, GitHub URL, Featured
```

### Manage Projects
- ✏️ Edit existing projects
- 👁️ View project details
- 🗑️ Delete projects with confirmation
- ⭐ Mark as featured
- 📄 Pagination (10 per page)

### Security
- Password-protected access
- Session-based authentication
- CSRF tokens on all forms
- Input validation

---

## 🌍 Deployment

### Production Deployment

```bash
# 1. Install production dependencies
composer install --no-dev

# 2. Setup production environment
cp .env.example .env.production
# Edit .env.production with production values

# 3. Build assets
npm run build

# 4. Run migrations
php artisan migrate --force

# 5. Enable caching
php artisan config:cache
php artisan route:cache
```

See [SETUP_GUIDE.md](SETUP_GUIDE.md) for detailed deployment instructions.

---

## 🔒 Security Notes

⚠️ **Before Production:**
- [ ] Change `ADMIN_PASSWORD` in `.env`
- [ ] Set `APP_DEBUG=false`
- [ ] Enable HTTPS/SSL
- [ ] Update database credentials
- [ ] Set strong `APP_KEY`
- [ ] Review security headers

---

## 📊 Database Schema

### Projects Table
| Column | Type | Description |
|--------|------|-------------|
| id | BIGINT | Primary key |
| title | VARCHAR(255) | Project title (unique) |
| description | VARCHAR(500) | Short description |
| long_description | LONGTEXT | Detailed description |
| technologies | TEXT | Tech stack (comma-separated) |
| image_url | TEXT | Project image |
| project_url | TEXT | Live project URL |
| github_url | TEXT | GitHub repository |
| featured | BOOLEAN | Featured on homepage |
| timestamps | TIMESTAMP | Created/Updated dates |

---

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=ProjectTest

# Generate coverage report
php artisan test --coverage
```

---

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/NewFeature`)
3. Make changes and commit (`git commit -m 'Add Feature'`)
4. Push branch (`git push origin feature/NewFeature`)
5. Open Pull Request

---

## 📞 Support

For issues or questions:
1. Check the [SETUP_GUIDE.md](SETUP_GUIDE.md)
2. Review [ADMIN_PANEL_DOCUMENTATION.md](ADMIN_PANEL_DOCUMENTATION.md)
3. Check [Laravel Documentation](https://laravel.com/docs)

---

## 📜 License

This project is licensed under the MIT License. See LICENSE file for details.

---

## 🎉 What's Included

✅ Complete Laravel 10 application  
✅ Beautiful responsive design  
✅ Secure admin panel  
✅ Full project management  
✅ Comprehensive documentation  
✅ Security best practices  
✅ Database migrations & seeders  
✅ Bootstrap 5.3 styling  
✅ Font Awesome 6.4 icons  
✅ Form validation  

---

## 🚀 Get Started

```bash
git clone https://github.com/YOUR_USERNAME/portfolio-website.git
cd portfolio-website
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Visit **http://localhost:8000** ✨

---

**Version**: 1.0.0  
**Last Updated**: 2025-12-04  
**Framework**: Laravel 10.50.0  
**PHP**: 8.1.10
