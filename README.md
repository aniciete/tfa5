# Point-of-Sale (POS) Foundations

**Course:** IT0049 (Web System Technologies)  
**Assessment:** Technical Formative Assessment 5 (TFA5)  
**Framework:** Laravel 13.x (PHP 8.5)  
**Hosted Application:** [http://tfa5.infinityfreeapp.com](http://tfa5.infinityfreeapp.com) ([HTTPS Mirror](https://tfa5.infinityfreeapp.com))  
**GitHub Repository:** [https://github.com/aniciete/tfa5](https://github.com/aniciete/tfa5)

---

## 1. Project Overview

This project is the Laravel reconstruction of the Point-of-Sale (POS) Foundations system originally established in TFA1. It demonstrates the Model-View-Controller (MVC) architectural pattern within Laravel, focusing on clean URL routing in `routes/web.php`, dedicated controller action methods, Blade templating layouts, and temporary in-memory static array data structures prior to permanent relational database integration.

### Required Pages and Route Table

| URL Route | Route Name | Controller Action | View Template | Purpose |
| :--- | :--- | :--- | :--- | :--- |
| `/` | `home` | `App\Http\Controllers\PageController::home` | `pages/home.blade.php` | POS application landing page with architectural overview and quick navigation |
| `/about` | `about` | `App\Http\Controllers\PageController::about` | `pages/about.blade.php` | Laravel MVC request execution lifecycle and architectural storage memo |
| `/customers` | `customers.index` | `App\Http\Controllers\CustomerController::index` | `customers/index.blade.php` | Customer accounts directory listing full name, email, and phone |
| `/users` | `users.index` | `App\Http\Controllers\UserController::index` | `users/index.blade.php` | Staff user accounts directory listing username, full name, and role |

---

## 2. Technical Stack & Prerequisites

- **Language:** PHP 8.3 or higher (tested on PHP 8.5.11; deployment runs on PHP 8.2+)
- **Required PHP Extensions:** `pdo_sqlite`, `pdo_mysql`, `mbstring`, `openssl`, `curl`, `xml`, `bcmath`, `intl`, `gd`, `zip`
- **Package Managers:** Composer 2.x & npm 10.x / Node.js 22.x
- **Framework:** Laravel 13.x
- **Frontend & Bundling:** Blade + Tailwind CSS v4 + Vite
- **Typography & Theme:** Bright-Market Design System (Self-hosted `Bricolage Grotesque` and `IBM Plex Mono`)
- **Database:** SQLite (default for development; migrations, seeders, and MySQL schema export in `database/`)

---

## 3. Local Development Setup

### 3.1 Clone the Repository
```bash
git clone https://github.com/aniciete/tfa5.git
cd tfa5
```

### 3.2 Install Dependencies
Install PHP dependencies:
```bash
composer install
```
Install frontend dependencies:
```bash
npm install
```

### 3.3 Configure Environment File
Copy the example environment template to `.env`:
```bash
cp .env.example .env
```
Generate the application key:
```bash
php artisan key:generate
```
Run database migrations and seeders (optional for runtime, fulfills submission criteria):
```bash
php artisan migrate --seed
```

### 3.4 Build Frontend Assets
Compile assets for development or production:
```bash
npm run build
```

### 3.5 Start the Local Development Server
To launch both the PHP development server and Vite hot reload concurrently:
```bash
composer run dev
```
Or start the backend server individually:
```bash
php artisan serve
```
Access the application locally at: **[http://localhost:8000](http://localhost:8000)** (or the port indicated in terminal output).

---

## 4. Architectural & Data Design

### Static In-Memory Data Source Implementation
In accordance with the TFA5 laboratory activity instructions:
- `App\Http\Controllers\CustomerController::index()` defines an in-memory static array containing 5 customer profiles (`full_name`, `email`, `phone`).
- `App\Http\Controllers\UserController::index()` defines an in-memory static array containing 5 staff user profiles (`username`, `full_name`, `role`).
- Blade views iterate these data structures using `@foreach` directives with automated HTML escaping.
- Complementary database migrations, model seeders (`CustomerSeeder`, `UserSeeder`), and a SQL schema export (`database/schema_export.sql`) are provided to fulfill grading rubric requirements.

---

## 5. Running Automated Tests

Run the automated test suite using Artisan:
```bash
php artisan test
```
The test suite (`tests/Feature/PosFoundationsTest.php`) validates:
- HTTP 200 OK responses across all four defined routes (`/`, `/about`, `/customers`, `/users`).
- Accessible semantic landmarks (`role="banner"`, `role="main"`, `role="contentinfo"`, and skip link `#main-content`).
- Accessible active navigation tracking (`aria-current="page"`).
- Accurate `@foreach` rendering of all 5 customer records and 5 staff records.
- Proper HTTP 404 response for unmapped routes.
- Integrity of local assets (`assets/css/style.css`, `favicon.svg`, and self-hosted `.woff2` font files).

---

## 6. InfinityFree & FTP Deployment Architecture

### 6.1 Shared Hosting & CSS Resilience Strategy
Deploying modern Laravel applications to shared hosting environments like InfinityFree involves several known challenges that were addressed in this implementation:
1. **Preventing Pure-FTPd Timeouts:** Uploading thousands of files individually over FTP triggers strict Pure-FTPd connection limits and drops transfers. Instead, the deployment utilizes a **single-archive upload + server-side extraction** pattern:
   - Packaging bundles all production files and lean dependencies into `tfa5-infinityfree.zip`.
   - `curl -T` uploads the single archive and `extract.php` in a single reliable connection.
   - `extract.php` unpacks the archive via PHP's native `ZipArchive` extension directly inside `/htdocs`, cleans up the ZIP, and self-destructs.
2. **Dual-Path Static Asset Resolution:** On InfinityFree, the document root is permanently bound to `/htdocs`. To ensure all stylesheets, fonts, and icons resolve cleanly without 404 or MIME errors, assets are mirrored at both the root level (`/assets/`, `/build/`) and within `/public/`.
3. **Eliminating Mixed Content SSL Errors:** Modern browsers block insecure stylesheets when a user navigates via HTTPS. The application configures trusted proxies (`$middleware->trustProxies(at: '*')`) in `bootstrap/app.php` and outputs protocol-relative asset links (`//tfa5.infinityfreeapp.com/assets/css/style.css`), ensuring assets match the protocol under both HTTP and HTTPS.

### 6.2 Automated Deployment Execution
Deploy the application with a single command via Bash:
```bash
./deploy-infinityfree.sh
```
Or via Python:
```bash
python3 scripts/deploy_infinityfree.py
```

The script automatically packages the application, transfers files to `ftpupload.net`, removes the default `index2.html` placeholder, and provides the extraction trigger.

Live application: **[http://tfa5.infinityfreeapp.com/](http://tfa5.infinityfreeapp.com/)**
