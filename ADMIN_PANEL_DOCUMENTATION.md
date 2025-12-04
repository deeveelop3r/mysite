# Admin Panel Documentation

## Overview
The admin panel provides a complete project management system with authentication and CRUD operations. It features a dark theme, responsive design, and real-time validation.

## Admin Panel Access

### Login
- **URL**: `http://localhost:8000/admin/login`
- **Default Password**: `admin123` (configurable via `ADMIN_PASSWORD` in `.env`)

### Dashboard
- **URL**: `http://localhost:8000/admin/projects` (after login)

---

## Features

### 1. Authentication System
- **Simple password-based authentication**
- Session-based user management
- Automatic redirect to login for unauthenticated users
- Logout functionality

**Files:**
- `app/Http/Controllers/Admin/AuthController.php` - Handles login/logout
- `app/Http/Middleware/AdminMiddleware.php` - Protects admin routes
- `resources/views/admin/login.blade.php` - Login form

### 2. Project Management (CRUD)

#### List Projects (`admin/projects/index.blade.php`)
- Displays all projects in a paginated table (10 per page)
- Shows: Title, Description (truncated), Technologies, Status (Featured/Draft), Created Date
- Action buttons: Edit, View, Delete
- "Add New Project" button in header
- Empty state message with link to create first project

#### Create Project (`admin/projects/create.blade.php`)
- Form fields:
  - **Title** (required, unique)
  - **Short Description** (required, max 500 chars)
  - **Detailed Description** (optional)
  - **Technologies** (required, comma-separated)
  - **Image URL** (required)
  - **Project URL** (optional, must be valid URL)
  - **GitHub URL** (optional, must be valid URL)
  - **Featured** (toggle switch, default off)
- Form validation with error messages
- Cancel button to return to projects list

#### Edit Project (`admin/projects/edit.blade.php`)
- Pre-populated form with existing project data
- Same fields as create with update functionality
- Metadata display: Created date and last updated timestamp
- Delete button opens confirmation modal
- "View" button links to project detail page

#### View Project (`admin/projects/show.blade.php`)
- Displays project details in read-only format
- Sections:
  - **Project Information**: Title, short description, long description, technologies
  - **Project Image**: Displays image with URL below
  - **Project Links**: Live project URL and GitHub repository URL
  - **Status**: Featured badge or Draft badge
  - **Timeline**: Creation and update timestamps
- Action buttons: Edit Project, Delete Project, Back button

---

## Database Schema

### Projects Table
```sql
CREATE TABLE projects (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL UNIQUE,
    description VARCHAR(500) NOT NULL,
    long_description LONGTEXT,
    technologies TEXT,
    image_url TEXT NOT NULL,
    project_url TEXT,
    github_url TEXT,
    featured BOOLEAN DEFAULT 0,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

---

## Validation Rules

### Create/Update Validation
| Field | Rules |
|-------|-------|
| title | required, string, max:255, unique (on update: exclude current ID) |
| description | required, string, max:500 |
| long_description | nullable, string |
| technologies | nullable, string |
| image_url | required, string |
| project_url | nullable, url |
| github_url | nullable, url |
| featured | boolean |

---

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Admin/
│   │       ├── ProjectController.php (CRUD operations)
│   │       └── AuthController.php (Authentication)
│   └── Middleware/
│       └── AdminMiddleware.php (Auth protection)
└── Models/
    └── Project.php (Project model)

resources/views/
├── admin/
│   ├── layout.blade.php (Admin layout with sidebar)
│   ├── login.blade.php (Login form)
│   └── projects/
│       ├── index.blade.php (Projects list)
│       ├── create.blade.php (Create form)
│       ├── edit.blade.php (Edit form)
│       └── show.blade.php (Project detail)

routes/
└── web.php (Admin routes group with middleware)
```

---

## Routes

### Admin Routes Group (Protected by `admin` middleware)

| Method | Path | Action | Description |
|--------|------|--------|-------------|
| GET | `/admin/login` | AuthController@login | Show login form |
| POST | `/admin/authenticate` | AuthController@authenticate | Process login |
| POST | `/admin/logout` | AuthController@logout | Logout user |
| GET | `/admin/projects` | ProjectController@index | List projects |
| GET | `/admin/projects/create` | ProjectController@create | Show create form |
| POST | `/admin/projects` | ProjectController@store | Store new project |
| GET | `/admin/projects/{project}` | ProjectController@show | Show project details |
| GET | `/admin/projects/{project}/edit` | ProjectController@edit | Show edit form |
| PUT | `/admin/projects/{project}` | ProjectController@update | Update project |
| DELETE | `/admin/projects/{project}` | ProjectController@destroy | Delete project |

---

## Design Features

### Styling
- **Color Scheme**: Dark theme with purple/blue accents
- **Primary Color**: `#667eea`
- **Secondary Color**: `#764ba2`
- **Background**: `#1a1a1a`
- **Card Background**: `#2a2a2a`

### Components
- Bootstrap 5.3 grid system
- Font Awesome 6.4 icons
- Responsive tables with mobile-friendly design
- Modals for delete confirmations
- Toast notifications for success/error messages
- Form validation with inline error display

### Layout
- **Fixed Sidebar**: 260px width navigation
- **Main Content Area**: Responsive to sidebar width
- **Topbar**: Title and action buttons
- **Card Layout**: Organized sections with headers

---

## Usage Examples

### Access Admin Panel
1. Visit `http://localhost:8000/admin/login`
2. Enter password: `admin123`
3. Click "Login"
4. Redirected to projects dashboard

### Create New Project
1. Click "Add New Project" button
2. Fill in all required fields
3. Click "Create Project"
4. Redirected to projects list with success message

### Edit Project
1. From projects list, click Edit button (pencil icon)
2. Modify desired fields
3. Click "Update Project"
4. Redirected to projects list with success message

### Delete Project
1. From projects list, click Delete button (trash icon)
2. Confirm deletion in modal
3. Project removed from database

### View Project
1. From projects list, click View button (eye icon)
2. View complete project details
3. Edit or delete from this page

---

## Security Features

### Authentication
- Session-based authentication
- Time-safe password comparison (`hash_equals()`)
- Automatic session expiration (120 minutes by default)

### Authorization
- All admin routes protected by `admin` middleware
- Unauthenticated requests redirected to login page

### Form Protection
- CSRF token validation on all POST/PUT/DELETE requests
- Input validation on all fields
- Error messages prevent information leakage

### Data Protection
- Unique title validation prevents duplicates
- Soft delete support (can be enabled)
- Timestamps track creation and modifications

---

## Environment Configuration

### .env Settings
```env
# Admin password (used for authentication)
ADMIN_PASSWORD=admin123

# Database
DB_CONNECTION=sqlite
DB_DATABASE=C:\Users\62877\Documents\mysite\mysite\database\portfolio.sqlite
```

---

## Troubleshooting

### Issue: "Unauthorized" or redirected to login
- **Cause**: Session not set or session expired
- **Solution**: Login again with password `admin123`

### Issue: "The password field is required"
- **Cause**: Form submitted without password
- **Solution**: Enter password and resubmit

### Issue: "Invalid admin password"
- **Cause**: Wrong password entered
- **Solution**: Use default password `admin123` or check `.env` file

### Issue: "The title has already been taken"
- **Cause**: Project with same title already exists
- **Solution**: Use a different title

### Issue: "The project URL must be a valid URL" or similar validation error
- **Cause**: Invalid URL format entered
- **Solution**: Enter valid URL (e.g., `https://example.com`)

---

## Future Enhancements

Potential improvements for production use:
1. **User Authentication**: Replace password with user accounts and roles
2. **Image Upload**: Add file upload instead of URL input
3. **Permissions**: Implement role-based access control (RBAC)
4. **Audit Logging**: Track all changes with who/when/what
5. **Bulk Operations**: Delete multiple projects at once
6. **Advanced Search**: Filter and search projects
7. **Analytics**: View project statistics and engagement
8. **API**: RESTful API for external integrations

---

## Performance Notes

- **Pagination**: 10 projects per page reduces load time
- **Lazy Loading**: Images lazy-loaded on portfolio pages
- **Database Indexing**: Title indexed for faster unique checks
- **Caching**: Session data cached in files for faster access

---

## Support & Maintenance

For issues or questions:
1. Check the troubleshooting section
2. Review validation rules for field requirements
3. Verify `.env` configuration
4. Check server logs in `storage/logs/`

Last Updated: 2025-12-04
