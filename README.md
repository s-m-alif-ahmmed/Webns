
<h1 align="center">Webns Technologies Office & Portal Management System</h1>

<p align="center">
  A comprehensive Enterprise Resource, Content Management, Career Portal, and Corporate Client Management Application built with <strong>Laravel 10</strong>.
</p>

---

## 📌 Project Overview & System Flow

The **Webns Application** is a full-featured web portal designed for Webns Technologies. It unifies a corporate website, an internal administrative management suite, an automated recruitment workflow, a bilingual FAQ engine, and an external company/team portal.

### System Architecture Flow:

```
                               ┌─────────────────────────────────────────┐
                               │            Webns Web Platform           │
                               └────────────────────┬────────────────────┘
                                                    │
         ┌──────────────────────────────────────────┼──────────────────────────────────────────┐
         ▼                                          ▼                                          ▼
┌──────────────────┐                       ┌──────────────────┐                       ┌──────────────────┐
│  Public Portal   │                       │ Outside Client   │                       │  Admin Backoffice│
│ (Corporate Site) │                       │  (Portal Users)  │                       │   (Internal)     │
└────────┬─────────┘                       └────────┬─────────┘                       └────────┬─────────┘
         │                                          │                                          │
 ┌───────┴──────────────┐                   ┌───────┴──────────────┐                   ┌───────┴──────────────┐
 │ • Products & Services│                   │ • Company Registration│                   │ • User & Role RBAC   │
 │ • Blogs & Multilingual│                   │ • Team Manager Auth  │                   │ • Department Management│
 │   Bilingual FAQ      │                   │ • Roster Management  │                   │ • Career & Applicants│
 │ • Career Job Listings│                   │   (Players & Coaches)│                   │ • Client Approval    │
 │ • Inquiry Forms      │                   │ • Status Tracking    │                   │ • Content Management │
 └──────────────────────┘                   └──────────────────────┘                   └──────────────────────┘
```

---

## 🚀 Key Modules & Features

### 1. 🌐 Public Website & Corporate Portal
- **Main Pages**: Home, About Us, Team Directory, Photo Gallery, Press Releases, and Events.
- **Product & Service Showcase**: Dynamic catalogue listing solutions, software tools, and targeted industries.
- **Bilingual FAQ Knowledgebase**: Searchable FAQ engine supporting English and Bangla query resolution.
- **Blog Engine**: Categorized articles with multi-tag filtering, SEO-friendly slugs, and popularity indicators.
- **Lead Inquiries**: Contact Forms, Product Demo Requests, Technical Support Tickets, and Email Subscriptions.

### 2. 💼 Career & Recruitment Portal
- **Job Listings**: Public job board with department and designation filters.
- **Job Applications**: Online resume upload (PDF), cover letter submissions, and applicant tracking.
- **Recruitment Pipeline**: Internal recruitment status tracking (`Checked`, `Shortlisted`, `Interview Call`, `Rejected`, `Hired`).

### 3. ⚽ Outside Users & Corporate Team Portal
- **Company Management**: Dedicated portal for external corporate clients or sports teams to register and manage company profiles.
- **Roster Management**: Registration of team players and coaches with ID verification photos.
- **Approval Workflow**: Admin moderation system for approving or rejecting outside user applications and roster submissions.

### 4. 🔐 Admin Control Center & Security
- **Role-Based Access Control (RBAC)**: Fine-grained JSON-based permission system (`Super Admin`, `Admin`, `HR`, `Content Manager`, `Viewer`).
- **User Ban & Restriction System**: Automated middleware (`userBan`, `outsideUser`) enforcing access constraints.
- **Employee & Department Directory**: Internal department and designation organizational hierarchy management.

---

## 📁 Repository Structure

```
Webns/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Administrative Controllers (Blog, Career, FAQ, Users, Contact, etc.)
│   │   │   ├── OutsideUsers/    # External Corporate Client Controllers (Auth, Dashboard, Players, Coaches)
│   │   │   └── Webns/           # Public Website Controllers (Home, Blog, Career, FAQ, Services, Products)
│   │   └── Middleware/          # Auth, Ban, and Guard Middlewares
│   └── Models/
│       ├── User.php             # Core User Model (RBAC & Credentials)
│       ├── Admin/               # Admin Models (User, Blog, Career, FAQ, Contact, DemoRequest, Support)
│       └── OutsideUsers/        # Outside User Models (Company, Player, Coach)
├── database/
│   ├── factories/               # Namespaced Eloquent Factories with Faker Data
│   ├── migrations/              # Database Schema Migrations (24 Tables)
│   └── seeders/                 # Modular Database Seeders & Main DatabaseSeeder
├── public/                      # Static Assets & Public Upload Directories
├── resources/
│   ├── views/                   # Blade Templates (Admin Panel, Corporate Site, Outside Portal)
│   └── css / js                 # Frontend Styles and Scripts
├── routes/
│   └── web.php                  # Application Route Definitions
├── composer.json                # PHP Dependencies
├── package.json                 # Node.js & Frontend Build Dependencies
└── vite.config.js               # Vite Bundler Configuration
```

---

## 🛠️ Project Setup & Installation Commands

Follow these step-by-step instructions to set up and run the project locally.

### Prerequisites
- **PHP**: `>= 8.1`
- **Composer**: `>= 2.0`
- **Node.js**: `>= 18.0` & **npm**
- **MySQL / MariaDB Database Server**

---

### Step 1: Clone the Repository
```bash
git clone https://github.com/s-m-alif-ahmmed/Webns.git
cd Webns
```

---

### Step 2: Install PHP Dependencies
```bash
composer install
```

---

### Step 3: Environment Configuration
Copy `.env.example` to create your local `.env` file:
```bash
cp .env.example .env
```
Generate the application key:
```bash
php artisan key:generate
```

Configure your MySQL database connection in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webns_office
DB_USERNAME=root
DB_PASSWORD=
```

---

### Step 4: Run Database Migrations & Seeders
To run the fresh database migrations along with all comprehensive seeders (which populates default Super Admin, departments, designations, blogs, FAQs, career posts, and outside users):

```bash
php artisan migrate:fresh --seed
```

#### Default Credentials (Post-Seeding):
| Role | Email | Password |
| :--- | :--- | :--- |
| **Super Admin** | `superadmin@webnstech.net` | `87654321` |

---

### Step 5: Install Frontend Dependencies & Compile Assets
```bash
npm install
npm run dev
```

For production asset bundling:
```bash
npm run build
```

---

### Step 6: Create Storage Symlink (For Image & Document Uploads)
```bash
php artisan storage:link
```

---

### Step 7: Launch Local Development Server
```bash
php artisan serve
```

Visit the application in your browser at `http://127.0.0.1:8000`.

---

## 📜 Database Seeding Commands Reference

To re-seed specific modules or reset test data:
```bash
# Seed all database tables cleanly
php artisan db:seed

# Seed individual seeders
php artisan db:seed --class=User
php artisan db:seed --class=DepartmentSeeder
php artisan db:seed --class=BlogSeeder
php artisan db:seed --class=CareerSeeder
php artisan db:seed --class=OutsideUserSeeder
```

---

## 📄 License
This project is open-sourced software licensed under the [MIT license](LICENSE).
