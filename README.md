<h1 align="center">🔍 Find-Out App</h1>

<p align="center">
  <strong>A full-stack service marketplace platform with a RESTful API and an admin dashboard</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
</p>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Environment Configuration](#-environment-configuration)
- [Running the Application](#-running-the-application)
- [Project Structure](#-project-structure)
- [Database Schema](#-database-schema)
- [API Reference](#-api-reference)
- [Admin Panel](#-admin-panel)
- [Architecture](#-architecture)
- [Running Tests](#-running-tests)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🌐 Overview

**Find-Out App** is a bilingual (**Arabic / English**) service marketplace platform that connects customers with local service providers. It exposes a **RESTful API** consumed by iOS and Android mobile clients, and includes a fully-featured **web-based admin dashboard** for managing the entire platform.

Services are organized geographically (Zones → Cities) and by hierarchical categories (Category Types → Categories → Sub-Categories). Customers can browse services, create advertisements, and contact service providers, while admins control approvals, user management, roles, and content.

---

## ✨ Features

### Customer (Mobile API)
- 📝 **Registration & Authentication** — token-based auth via Laravel Sanctum
- 🗂️ **Browse Services** — filter by category, zone, and city
- 📢 **Advertisement Management** — create, update, and delete personal ads
- 🌍 **Geographic Discovery** — explore services by zone and city
- 📄 **CMS Pages** — view static content pages
- 📬 **Contact Us** — submit inquiries directly from the app
- 🔗 **Social Media** — view platform social media links
- 🌐 **Multi-language Support** — full Arabic and English content

### Admin Dashboard (Web)
- 🔐 **Secure Admin Login** — session-based authentication
- 👥 **Role & Permission Management** — fine-grained RBAC via Spatie permissions
- 📋 **Advertisement Approval Workflow** — review and approve/reject ads
- 🛠️ **Service Management** — full CRUD with images, zones, and cities
- 📁 **Category & Category Type Management** — hierarchical category system
- 🗺️ **Zone & City Management** — geographic data administration
- 👤 **Customer Management** — view and manage registered users
- 📞 **Contact Requests** — view incoming contact submissions
- 📑 **Page Management** — create and edit CMS pages (AR/EN)
- 📱 **Social Media Management** — manage platform social links

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Backend Framework** | [Laravel 10](https://laravel.com) (PHP 8.1+) |
| **Authentication** | [Laravel Sanctum](https://laravel.com/docs/sanctum) (API) + Session (Web) |
| **Authorization** | [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) |
| **Multi-language** | [Spatie Laravel Translatable](https://github.com/spatie/laravel-translatable) + [mcamara/laravel-localization](https://github.com/mcamara/laravel-localization) |
| **Frontend (Admin)** | [Blade](https://laravel.com/docs/blade) + [Alpine.js 3](https://alpinejs.dev) + [Tailwind CSS 3](https://tailwindcss.com) |
| **Build Tool** | [Vite 4](https://vitejs.dev) |
| **Database** | MySQL 8.0+ |
| **ORM** | [Laravel Eloquent](https://laravel.com/docs/eloquent) |
| **HTTP Client** | [Guzzle 7](https://docs.guzzlephp.org) |
| **Testing** | PHPUnit 10 |
| **Code Style** | [Laravel Pint](https://laravel.com/docs/pint) |
| **Local Dev** | [Laravel Sail](https://laravel.com/docs/sail) (Docker) |

---

## ✅ Prerequisites

Before you begin, make sure you have the following installed:

- **PHP** >= 8.1 (with extensions: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`)
- **Composer** >= 2.x
- **Node.js** >= 16.x and **npm** >= 8.x
- **MySQL** >= 8.0
- **Git**

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Mohammed-Alijl/find-out-app.git
cd find-out-app
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install JavaScript Dependencies

```bash
npm install
```

### 4. Set Up Environment File

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure the Database

Create a MySQL database and update the `.env` file with your credentials (see [Environment Configuration](#-environment-configuration)), then run migrations and seed the database:

```bash
php artisan migrate
php artisan db:seed
```

> The seeder creates the default admin account, permission roles, country/zone/city data, and social media entries.

### 6. Create the Storage Symlink

```bash
php artisan storage:link
```

### 7. Build Frontend Assets

```bash
# For production
npm run build

# For development (with hot reload)
npm run dev
```

---

## ⚙️ Environment Configuration

Copy `.env.example` to `.env` and update the following key variables:

```dotenv
APP_NAME="Find-Out App"
APP_ENV=local
APP_KEY=           # Generated by php artisan key:generate
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=out_find
DB_USERNAME=root
DB_PASSWORD=

# Sanctum (API Authentication)
SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1

# Default Locale
APP_LOCALE=en
```

---

## ▶️ Running the Application

### Development

```bash
# Start the Laravel development server
php artisan serve

# In a separate terminal, start Vite (hot reload for admin assets)
npm run dev
```

The application will be accessible at:
- **App / API**: `http://localhost:8000`
- **Admin Panel**: `http://localhost:8000/admin`
- **Vite Dev Server**: `http://localhost:5173`

### Using Docker (Laravel Sail)

```bash
# Install Sail (first time only)
composer require laravel/sail --dev
php artisan sail:install

# Start all containers
./vendor/bin/sail up -d

# Run migrations inside the container
./vendor/bin/sail artisan migrate --seed
```

### Production

```bash
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
```

---

## 📁 Project Structure

```
find-out-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin panel controllers
│   │   │   ├── Api/            # REST API controllers
│   │   │   └── Auth/           # Authentication controllers
│   │   ├── Middleware/         # Custom middleware
│   │   ├── Requests/           # Form request validation
│   │   └── Resources/          # API JSON resources (transformers)
│   ├── Interfaces/             # Repository contracts
│   ├── Models/                 # Eloquent models (13)
│   ├── Repositories/           # Data access layer
│   └── Traits/                 # Reusable traits (e.g. Api_Response)
├── config/                     # App configuration files
├── database/
│   ├── migrations/             # Database schema (20 migration files)
│   ├── seeders/                # Seed data (admin, roles, countries)
│   └── factories/
├── lang/
│   ├── en/                     # English translations
│   └── ar/                     # Arabic translations
├── public/                     # Web root (compiled assets, images)
├── resources/
│   ├── css/                    # Tailwind CSS source
│   ├── js/                     # JavaScript source (Alpine.js, Axios)
│   └── views/
│       ├── admin/              # Admin Blade templates
│       ├── auth/               # Authentication views
│       ├── components/         # Reusable Blade components
│       └── layouts/            # Layout templates
├── routes/
│   ├── api.php                 # REST API routes
│   ├── admin.php               # Admin panel routes
│   ├── auth.php                # Web authentication routes
│   └── web.php                 # Public web routes
├── storage/                    # Logs, file uploads, cache
├── tests/
│   ├── Feature/                # Feature/integration tests
│   └── Unit/                   # Unit tests
├── .env.example                # Environment template
├── composer.json               # PHP dependencies
├── package.json                # Node.js dependencies
└── vite.config.js              # Vite build configuration
```

---

## 🗄️ Database Schema

### Core Tables

| Table | Description |
|---|---|
| `users` | Customer accounts (name, email, mobile, zone, city, platform) |
| `admins` | Admin accounts with role-based permissions |
| `services` | Service listings (name, details, timing, social links, images) |
| `advertisements` | Customer-created ads linked to a service and category |
| `advertisement_images` | Images attached to advertisements |
| `service_images` | Images attached to services |
| `categories` | Categories with parent-child hierarchy |
| `category_types` | Top-level category groupings |
| `zones` | Geographic regions (linked to a country) |
| `cities` | Cities within a zone |
| `countries` | Country records |
| `pages` | CMS static pages (AR/EN translatable) |
| `contacts` | Contact form submissions |
| `social_media` | Platform social media links |

### Pivot Tables

| Table | Relationship |
|---|---|
| `service_zone` | Many-to-many: Services ↔ Zones |
| `city_service` | Many-to-many: Services ↔ Cities |

### Permission Tables (Spatie)

`roles`, `permissions`, `role_has_permissions`, `model_has_roles`, `model_has_permissions`

---

## 📡 API Reference

**Base URL**: `/api`

All responses use a consistent JSON envelope:

```json
{
  "status": true,
  "message": "...",
  "data": { ... }
}
```

### 🔓 Public Endpoints

#### Authentication
| Method | Endpoint | Description |
|---|---|---|
| `POST` | `/api/auth/register` | Register a new customer |
| `POST` | `/api/auth/login` | Login and receive an API token |

#### Services
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/services` | List all services |
| `GET` | `/api/services/{id}` | Get a service's details |

#### Categories
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/category/types` | List all category types |
| `GET` | `/api/categories` | List all categories |
| `GET` | `/api/categories/{id}` | Get a single category |
| `GET` | `/api/sub/category/{id}` | Get sub-categories of a category |

#### Geography
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/zones` | List all zones |
| `GET` | `/api/zone/cities/{id}` | List cities in a zone |
| `GET` | `/api/cities` | List all cities |

#### Advertisements
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/advertisements` | List all approved advertisements |
| `GET` | `/api/advertisements/{id}` | Get a single advertisement |

#### Other
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/pages` | List CMS pages |
| `GET` | `/api/pages/{id}` | Get a single page |
| `GET` | `/api/socials` | List social media links |
| `GET` | `/api/customers/{id}` | Get a customer's public profile |
| `POST` | `/api/contact-us` | Submit a contact inquiry |

---

### �� Authenticated Endpoints

Include the token in the request header:

```
Authorization: Bearer {your_token}
```

#### Profile
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/auth/customer` | Get authenticated customer profile |
| `PUT` | `/api/auth/update` | Update authenticated customer profile |
| `DELETE` | `/api/auth/logout` | Logout (invalidate token) |

#### Advertisements
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/customer/advertisements` | List the authenticated user's ads |
| `POST` | `/api/advertisements` | Create a new advertisement |
| `PUT` | `/api/advertisements/{id}` | Update an advertisement |
| `DELETE` | `/api/advertisements/{id}` | Delete an advertisement |

---

## 🖥️ Admin Panel

The admin panel is accessible at `/admin` and requires admin credentials (created by the database seeder).

### Available Sections

| Section | URL | Description |
|---|---|---|
| Dashboard | `/admin/` | Overview and quick stats |
| Services | `/admin/services` | Manage service listings and images |
| Advertisements | `/admin/advertisements` | Browse all advertisements |
| Ad Approval | `/admin/ad/requests` | Review and approve/reject pending ads |
| Categories | `/admin/categories` | Manage category hierarchy |
| Category Types | `/admin/category-types` | Manage top-level category groups |
| Zones | `/admin/zones` | Manage geographic zones |
| Cities | `/admin/cities` | Manage cities within zones |
| Customers | `/admin/customers` | View and manage customer accounts |
| Contact Requests | `/admin/contacts` | View submitted contact forms |
| Pages | `/admin/pages` | Manage CMS pages (AR/EN) |
| Social Media | `/admin/social-media` | Manage social media links |
| Admin Users | `/admin/users` | Manage admin accounts |
| Roles | `/admin/roles` | Manage roles and permissions |

---

## 🏗️ Architecture

Find-Out App follows a clean, layered architecture built on proven Laravel patterns:

- **Repository Pattern** — all database interactions are abstracted behind repository classes that implement `BasicRepositoryInterface`, keeping controllers thin and testable.
- **API Resources** — Eloquent models are transformed to JSON using dedicated resource classes, decoupling the database schema from the API contract.
- **Form Requests** — input validation and authorization are handled in dedicated `FormRequest` classes, keeping controller logic clean.
- **Traits** — the `Api_Response` trait provides a consistent JSON response format across all API controllers.
- **Role-Based Access Control** — admin permissions are managed with Spatie Laravel Permission, allowing fine-grained control over which admins can access which sections.
- **Multi-language** — translatable models (Spatie Translatable) and localized routes (mcamara/laravel-localization) provide full Arabic and English support throughout the platform.

---

## 🧪 Running Tests

```bash
# Run the full test suite
php artisan test

# Run only unit tests
php artisan test --testsuite=Unit

# Run only feature tests
php artisan test --testsuite=Feature

# Run with coverage report (requires Xdebug or PCOV)
php artisan test --coverage
```

To check code style:

```bash
./vendor/bin/pint --test   # Dry run (no changes)
./vendor/bin/pint          # Fix code style issues
```

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. **Fork** the repository
2. **Create a feature branch**: `git checkout -b feature/your-feature-name`
3. **Commit your changes**: `git commit -m 'feat: add your feature'`
4. **Push to the branch**: `git push origin feature/your-feature-name`
5. **Open a Pull Request**

Please ensure your code:
- Passes all existing tests (`php artisan test`)
- Follows the project's code style (`./vendor/bin/pint`)
- Includes tests for new functionality

---

## 📄 License

This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).
