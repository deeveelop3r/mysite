# MyPortfolio Website - Deployment Guide

Panduan lengkap untuk deploy Laravel portfolio website ke berbagai platform.

## 📍 Repository

**GitHub**: https://github.com/deeveelop3r/mysite

---

## 🚀 Deployment Options

### Option 1: Railway (Recommended - Easiest)

Best untuk Laravel + Database

#### Setup Railway

1. **Visit Railway**
   ```
   https://railway.app
   ```

2. **Login with GitHub**
   ```
   → Sign in with GitHub
   → Authorize Railway
   ```

3. **Create New Project**
   ```
   → Click "New Project"
   → Select "Deploy from GitHub repo"
   → Choose: mysite
   ```

4. **Configure Environment**
   ```
   Railway automatically detects Laravel
   Create variables from .env:
   
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:xxx (already set)
   DB_CONNECTION=mysql
   DB_HOST=[Railway MySQL host]
   DB_DATABASE=portfolio
   DB_USERNAME=[Auto-generated]
   DB_PASSWORD=[Auto-generated]
   ```

5. **Deploy**
   ```
   Railway automatically deploys
   → Watch build logs
   → App goes live
   ```

**Result**: Live Laravel app with database! 🎉

---

### Option 2: Heroku (Alternative)

Used to be free, now paid but reliable.

#### Setup Heroku

```bash
# Install Heroku CLI
npm install -g heroku

# Login
heroku login

# Create app
cd mysite
heroku create mysite-portfolio

# Add MySQL database
heroku addons:create jawsdb:kitefin

# Deploy
git push heroku main

# Run migrations
heroku run php artisan migrate

# View live site
heroku open
```

**Result**: `mysite-portfolio.herokuapp.com`

---

### Option 3: DigitalOcean App Platform

Good for full control + reasonable pricing

#### Setup DigitalOcean

1. **Create DigitalOcean Account**
   - https://digitalocean.com

2. **Connect GitHub**
   - App Platform → Create App
   - Select: mysite repository

3. **Configure**
   ```
   Framework: Laravel
   Root Directory: ./
   Build Command: composer install
   Run Command: php artisan serve
   ```

4. **Add Database**
   - MySQL database
   - Connect to app

5. **Deploy**
   - Add environment variables
   - Click Deploy

**Result**: Your own managed app!

---

### Option 4: Shared Hosting (Traditional)

jika prefer traditional hosting dengan control panel.

#### Setup Shared Hosting

1. **Purchase Hosting**
   - Ensure PHP 8.1+ support
   - MySQL database included

2. **Upload Files**
   ```bash
   # Via FTP or File Manager
   Upload semua files ke public_html/
   ```

3. **Setup Environment**
   ```
   Create .env file with database credentials
   Set correct permissions:
   chmod 755 storage/
   chmod 755 bootstrap/cache/
   ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Configure Domain**
   - Point domain to public folder
   - Update APP_URL

**Result**: Website live di domain kamu!

---

## 🎯 Recommended: Railway (Easiest & Free)

Karena:
- ✅ Seamless GitHub integration
- ✅ Automatic deployments on push
- ✅ Included MySQL database
- ✅ Free tier generous
- ✅ Zero configuration needed
- ✅ Scales automatically

### Railway Quick Deploy

**1. Visit**: https://railway.app

**2. Click**: "New Project"

**3. Select**: "Deploy from GitHub repo"

**4. Choose**: deeveelop3r/mysite

**5. Wait**: ~2 minutes for deployment

**6. Done!** Your app is live! 🚀

---

## 📊 Deployment Comparison

| Feature | Railway | Heroku | DigitalOcean | Shared Host |
|---------|---------|--------|--------------|-------------|
| **Setup Time** | 5 min | 10 min | 15 min | 30 min |
| **Cost** | Free | $7+/mo | $5+/mo | $5+/mo |
| **Database** | Included | Pay extra | Included | Included |
| **Scalability** | Auto | Manual | Manual | Limited |
| **GitHub Deploy** | Auto | Auto | Auto | Manual |
| **Custom Domain** | Yes | Yes | Yes | Yes |
| **Ease** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐ |

---

## 🔧 Pre-Deployment Checklist

Before deploying anywhere, verify:

```bash
# Check git status
git status

# Verify commits
git log --oneline -5

# Check Laravel installation
php artisan --version

# Test locally
php artisan serve

# Check database
sqlite3 database/portfolio.sqlite ".tables"

# Verify all files committed
git add .
git commit -m "Final deployment ready"
git push origin main
```

---

## 📝 Environment Variables for Production

Create `.env` file on server with:

```env
APP_NAME=MyPortfolio
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomainhere.com

# Database (for Railway/Heroku/etc)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=your_password

# Or use SQLite
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

# Cache & Session
CACHE_DRIVER=redis
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync

# Mail (optional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

---

## 🚀 Post-Deployment

### After Deploy Success

1. **Verify Website**
   - Visit your live URL
   - Test all pages
   - Check performance

2. **Run Migrations**
   ```bash
   # On Railway/Heroku
   railway run php artisan migrate
   # or
   heroku run php artisan migrate
   ```

3. **Seed Data**
   ```bash
   railway run php artisan db:seed
   # or
   heroku run php artisan db:seed
   ```

4. **Setup Domain**
   - Add custom domain in dashboard
   - Update DNS records
   - Verify SSL certificate

5. **Monitor**
   - Check application logs
   - Monitor performance
   - Setup alerts

---

## 🔐 Security Checklist

Before production:

- [ ] `APP_DEBUG=false` in .env
- [ ] `APP_ENV=production` set
- [ ] Strong `APP_KEY` generated
- [ ] Database credentials secured
- [ ] SSL certificate enabled
- [ ] Backups configured
- [ ] Monitoring setup
- [ ] Error logging configured

---

## 📊 Live URLs After Deployment

Depending on platform chosen:

**Railway**: 
```
https://mysite-production.up.railway.app
```

**Heroku**:
```
https://mysite-portfolio.herokuapp.com
```

**DigitalOcean**:
```
https://mysite.ondigitalocean.app
```

**Custom Domain**:
```
https://myportfolio.com
```

---

## 💡 Additional Features

### Enable Redis Caching
```bash
# Speeds up website
CACHE_DRIVER=redis
```

### Setup Email
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxx
MAIL_PASSWORD=xxx
```

### Enable Queue Processing
```env
QUEUE_CONNECTION=redis
# For background jobs
```

---

## 🛠 Deployment Commands

### Railway
```bash
# View logs
railway logs

# Run commands
railway run php artisan migrate

# View environment
railway variable list
```

### Heroku
```bash
# View logs
heroku logs --tail

# Run commands
heroku run php artisan migrate

# Check status
heroku status
```

---

## 🎬 Recommended Flow

**1. Test Locally**
```bash
cd mysite
php artisan serve
# Visit: http://localhost:8000
# Test all pages & features
```

**2. Push to GitHub**
```bash
git add .
git commit -m "Ready for production"
git push origin main
```

**3. Deploy to Railway**
```
1. Visit railway.app
2. New Project → GitHub repo (mysite)
3. Configure variables
4. Deploy!
```

**4. Verify Live**
```
Visit: https://your-app.railway.app
Test all functionality
```

**5. Add Domain** (optional)
```
Point domain to Railway
Setup SSL
Share URL
```

---

## ❓ Troubleshooting

### Build Fails
- Check Laravel version compatibility
- Verify PHP 8.1+ requirement
- Check build logs for errors
- Ensure all dependencies in composer.json

### Database Issues
- Create database connection
- Run migrations: `php artisan migrate`
- Seed data: `php artisan db:seed`
- Check database credentials

### Page Not Loading
- Check APP_URL in .env
- Verify public folder permissions
- Clear cache: `php artisan cache:clear`
- Check error logs

### Slow Performance
- Enable caching (Redis)
- Optimize database queries
- Use CDN for assets
- Enable compression

---

## 📚 Resources

- **Railway Docs**: https://docs.railway.app
- **Laravel Deployment**: https://laravel.com/docs/deployment
- **Heroku Docs**: https://devcenter.heroku.com
- **DigitalOcean Docs**: https://docs.digitalocean.com

---

## ✅ Summary

**MyPortfolio Website** is ready to deploy!

### Quickest Path to Live:
1. Go to Railway.app
2. Import GitHub repo
3. Deploy (2 minutes)
4. Done! 🚀

### Live URL:
```
https://mysite-production.up.railway.app
(or custom domain)
```

---

**Your portfolio website will be accessible worldwide! 🌍**

*Choose your deployment method and go live! 🚀*
