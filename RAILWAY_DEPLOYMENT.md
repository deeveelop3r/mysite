# Railway Deployment - MyPortfolio Website

Step-by-step guide untuk deploy Laravel portfolio ke Railway.

## 🎯 Why Railway?

✅ **Easiest deployment** untuk Laravel  
✅ **Includes MySQL database** - no extra setup  
✅ **GitHub integration** - auto deploy on push  
✅ **Free tier** - generous usage  
✅ **No credit card** needed initially  
✅ **Zero configuration** required  

---

## 🚀 Railway Deployment Steps

### Step 1: Create Railway Account

1. **Visit**: https://railway.app

2. **Click**: "Start a New Project"

3. **Sign in with GitHub**
   ```
   → Click "GitHub" option
   → Authorize Railway
   → Grant permissions
   ```

4. **Done!** Account created ✅

---

### Step 2: Deploy from GitHub

1. **Click**: "New Project"

2. **Select**: "Deploy from GitHub repo"

3. **Search**: "mysite"

4. **Select**: deeveelop3r/mysite

5. **Authorize**: Grant access if prompted

6. **Railway starts building!** ✅

---

### Step 3: Configure Environment

After initial build, Railway auto-detects Laravel.

1. **Go to**: Project Variables tab

2. **Add/Update Variables**:

```env
APP_NAME=MyPortfolio
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:XXXXXXXX (keep existing)
APP_URL=https://mysite-production.up.railway.app

DB_CONNECTION=mysql
DB_HOST=${MYSQL_HOST}
DB_PORT=${MYSQL_PORT}
DB_DATABASE=${MYSQL_DATABASE}
DB_USERNAME=${MYSQL_USER}
DB_PASSWORD=${MYSQL_PASSWORD}

CACHE_DRIVER=redis
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync
```

3. **MySQL Auto-Linked**
   Railway automatically creates MySQL service!

4. **Save Variables** ✅

---

### Step 4: First Deployment Verification

Railway usually auto-deploys. To verify:

1. **Go to**: Deployments tab

2. **Check Status**:
   - ✅ Build: Success
   - ✅ Deploy: Success

3. **View Logs** (if needed):
   ```
   Click "View Logs" to see build process
   ```

---

### Step 5: Run Migrations

After deployment, setup database:

1. **Go to**: Terminal in Railway dashboard

2. **Run Commands**:
   ```bash
   # Run migrations
   php artisan migrate
   
   # Seed sample data
   php artisan db:seed
   
   # View database
   php artisan tinker
   ```

3. **Or use** Railway CLI:
   ```bash
   railway run php artisan migrate
   railway run php artisan db:seed
   ```

---

### Step 6: Access Your Live Site

1. **Go to**: "Deployments" tab

2. **Find**: Your deployment URL
   ```
   https://mysite-production.up.railway.app
   (or similar)
   ```

3. **Click** to open in browser

4. **Done!** Your site is LIVE! 🎉

---

## 🔗 Custom Domain (Optional)

Add your own domain:

1. **Go to**: Project Settings

2. **Click**: "Domains"

3. **Add Domain**:
   ```
   myportfolio.com
   www.myportfolio.com
   ```

4. **Update DNS**:
   ```
   Type: CNAME
   Name: www
   Value: cname.railway.app
   TTL: 3600
   ```

5. **Verify**:
   - Wait 5-10 minutes
   - Visit your domain
   - Should show your site! ✅

---

## 📊 Railway Services Created

Railway automatically creates:

1. **MySQL Database**
   - Secure connection
   - Auto backups
   - Included free tier

2. **Laravel App**
   - Built from GitHub
   - Auto-updated on push
   - Deployed globally

3. **Redis Cache** (optional)
   - Can add for caching

---

## 🔄 Auto-Deployment from GitHub

Railway watches your GitHub repo!

**Every git push** triggers:
```
1. GitHub detects new commit
2. Notifies Railway
3. Railway pulls latest code
4. Runs build process
5. Deploys to production
6. ~2-5 minutes later: LIVE!
```

**Example**:
```bash
# Make changes locally
git add .
git commit -m "Update portfolio"
git push origin main

# Railway automatically deploys!
# Visit your site → See changes! 🚀
```

---

## 📝 Important Variables

Keep these in Railway:

| Variable | Value | Purpose |
|----------|-------|---------|
| APP_ENV | production | Environment |
| APP_DEBUG | false | Disable debug |
| APP_KEY | base64:... | Encryption |
| DB_HOST | ${MYSQL_HOST} | Database host |
| DB_PORT | ${MYSQL_PORT} | Database port |
| DB_NAME | ${MYSQL_DATABASE} | Database name |

---

## 🔒 Security Checklist

✅ `APP_DEBUG=false`  
✅ `APP_ENV=production`  
✅ `APP_KEY` is strong  
✅ Database credentials secure  
✅ No sensitive data in git  
✅ `.env` file in `.gitignore`  

---

## 📊 View Logs & Monitoring

### Check Deployment Logs
```bash
railway logs

# Or in Railway dashboard:
# Deployments → Select deployment → View Logs
```

### Monitor Performance
```bash
# Railway dashboard shows:
✓ CPU usage
✓ Memory usage
✓ Request count
✓ Error rate
```

---

## 🔧 Useful Railway Commands

Install Railway CLI first:
```bash
npm i -g @railway/cli
# or
npm install -g railway
```

Then use:
```bash
# Login
railway login

# Link to project
railway link

# View logs
railway logs

# Run command
railway run php artisan migrate

# View environment
railway variables

# Add variable
railway variables set APP_DEBUG false
```

---

## 💰 Pricing

**Free Tier**:
- $5 credit per month
- Includes: App + MySQL database
- Enough for small site

**Beyond Free**:
- Pay-as-you-go (very cheap)
- Database: ~$5/month
- App: ~$2-3/month

Total: ~$10/month for everything!

---

## 🎬 After Deployment

### Immediate Tasks
1. ✅ Visit your live URL
2. ✅ Test all pages
3. ✅ Verify contact form (if exists)
4. ✅ Check database is working

### Next Steps
1. Add custom domain
2. Setup monitoring
3. Configure email (optional)
4. Setup backups

### Share Your Site!
```
Your portfolio is now live:
https://mysite-production.up.railway.app

Share with:
- Portfolio reviewers
- Potential clients
- Your network
- LinkedIn profile
```

---

## ❓ Common Issues

### Deployment Fails
- Check build logs
- Verify PHP 8.1+ requirement
- Ensure all dependencies installed
- Check for syntax errors

### Database Not Connecting
- Verify MySQL service is running
- Check DB credentials in variables
- Ensure database name is correct
- Run `railway run php artisan migrate`

### Page Shows 404
- Verify APP_URL is correct
- Check public folder permissions
- Ensure migrations ran
- Clear cache: `railway run php artisan cache:clear`

### Site is Slow
- Enable Redis caching
- Optimize database queries
- Check deployment logs
- Contact Railway support

---

## 📞 Support

**Railway Support**:
- Docs: https://docs.railway.app
- Troubleshooting: https://railway.app/troubleshooting
- Community: https://railway.app/community

**Laravel Support**:
- Docs: https://laravel.com/docs
- Community: https://laravel.io

---

## ✅ Success Criteria

After deployment, you should have:

- ✅ Live website accessible
- ✅ Database working
- ✅ All pages loading
- ✅ Admin functionality working
- ✅ Forms submitting correctly
- ✅ No error messages
- ✅ Fast load times
- ✅ Mobile responsive

---

## 🎯 You're Done!

**Your Laravel portfolio website is now:**

```
🌍 LIVE on Railway
⚡ Auto-deployed from GitHub
🔒 Secure with SSL
💾 Backed by MySQL database
🚀 Ready for production
```

---

**Visit your site**: https://mysite-production.up.railway.app

**Share with everyone!** 🚀

---

*Step-by-step deployment complete! Your portfolio is now accessible worldwide!*
