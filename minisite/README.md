# Kwartir Cabang Landing Page

Single-page static site for Kwartir Cabang (Pramuka) built with HTML/CSS/JS only.

## Jalankan Lokal
1) Buka `index.html` langsung di browser, atau
2) Pakai server ringan: `npx serve .` lalu akses http://localhost:3000 (opsional).

## Deploy ke GitHub Pages
1) Inisialisasi repo dan push:
```
git init
git add .
git commit -m "Add Kwartir Cabang site"
git branch -M main
git remote add origin https://github.com/<user>/minisite.git
git push -u origin main
```
2) Di GitHub: Settings → Pages → Source: `GitHub Actions`. Workflow `.github/workflows/deploy.yml` sudah disiapkan; setiap push ke `main` akan menerbitkan laman Pages.

## Deploy ke Vercel
- Via CLI:
```
npm i -g vercel
vercel        # pilih root ".", project static
vercel --prod # deploy produksi
```
- Via dashboard: New Project → Import from GitHub → pilih repo → Framework "Other"/"Static" dengan root `.` → Deploy. File `vercel.json` disiapkan untuk URL rapi.

Setel email/nomor WhatsApp di `index.html` sesuai kebutuhan sebelum deploy.
