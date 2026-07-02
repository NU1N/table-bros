# TableBros — Project Context

## Directory Overview

TableBros is a **Laravel 13** web application built with PHP 8.4. It is a social/event management platform featuring parties/events, news, user profiles, and social (OAuth) authentication via Yandex and VKontakte. The project uses **Filament 5** for the admin panel, **Livewire 4** for reactive UI, **TailwindCSS 4** + **Alpine.js 3** for styling, and **Laravel Sail** (Docker) for the development environment.

## Project Type

Laravel full-stack web application (PHP backend + Blade/Vite/Livewire frontend).

## Architecture & Key Files

### Application Structure
```
app/
  Enums/           — Domain enums (e.g., SocialiteProvider)
  Http/Controllers/ — Request handlers
  Models/          — Eloquent models (User)
  Providers/       — Service providers (Filament panel, app service)
  Services/        — Business logic (UserService)
config/            — Laravel configuration files
database/
  migrations/      — DB schema migrations
  factories/       — Model factories for testing
  seeders/         — Database seeders
resources/
  views/           — Blade templates (landing, parties, news, profile, privacy)
  css/             — TailwindCSS entry point
  js/              — Alpine.js / vanilla JS entry point
routes/            — web.php (HTTP routes), console.php (Artisan commands)
storage/           — Logs, cache, uploaded files
tests/             — PHPUnit Feature + Unit tests
```

### Core Routes (`routes/web.php`)
| Route | Controller | Purpose |
|---|---|---|
| `/` | `LandingController` | Landing/home page |
| `/parties` | `PartyController@index` | List all parties/events |
| `/parties/{slug}` | `PartyController@show` | Single party detail |
| `/news` | `NewsController@index` | News listing |
| `/news/{slug}` | `NewsController@show` | Single news post |
| `/profile` | `ProfileController` | User profile page |
| `/privacy` | inline | Privacy policy view |
| `/auth/{provider}/redirect` | `AuthController@redirectToProvider` | OAuth start (Yandex/VK) |
| `/auth/{provider}/callback` | `AuthController@handleCallback` | OAuth callback |
| `POST /logout` | `AuthController@logout` | Logout |

### Admin Panel
- **URL path:** `/admin`
- **Provider:** `app/Providers/Filament/AdminPanelProvider.php`
- Resources/pages/widgets auto-discovered from `app/Filament/`

### Models
- **`User`** (`app/Models/User.php`) — Standard Laravel auth model with added `socialite_provider` and `socialite_provider_id` columns for OAuth login.

### Authentication
- **Socialite providers:** Yandex, VKontakte (enum: `App\Enums\SocialiteProvider`)
- **Service:** `App\Services\UserService` handles create-or-update logic from Socialite user data.
- **Config:** OAuth credentials in `.env` (`VKONTAKTE_*`, `YANDEX_*`).

### Database
- **Engine:** MySQL 8.4 (via Sail)
- **Migrations:** 4 files (users, cache, jobs, socialite columns)
- **Sessions/Caching:** Database-backed
- **Queue:** Database-backed

### Frontend
- **Build tool:** Vite 8 (`laravel-vite-plugin`)
- **CSS:** TailwindCSS 4 (`@tailwindcss/vite`)
- **JS:** Alpine.js 3 + Flowbite 4
- **Entry points:** `resources/css/app.css`, `resources/js/app.js`

## Building and Running

### Prerequisites
- Docker + Docker Compose
- PHP 8.4+ (or use Sail)

### Initial Setup
```bash
# Copy environment
cp .env.example .env
# Generate app key
php artisan key:generate
# Start Sail services (MySQL, Redis)
vendor/bin/sail up -d
# Run migrations
vendor/bin/sail artisan migrate
# Build frontend
vendor/bin/sail npm run build
```

### Development
```bash
# Start all Sail services
vendor/bin/sail up -d

# Run the full dev stack (server + queue + logs + Vite HMR)
vendor/bin/sail composer run dev

# Or run individually:
vendor/bin/sail npm run dev        # Vite dev server with HMR
vendor/bin/sail artisan serve      # Laravel development server
vendor/bin/sail artisan pail       # Log watcher
vendor/bin/sail artisan queue:listen  # Queue worker

# Build for production
vendor/bin/sail npm run build
```

### Testing
```bash
# Run all tests
vendor/bin/sail artisan test

# Run a specific test file
vendor/bin/sail artisan test tests/Feature/ExampleTest.php

# Run with compact output
vendor/bin/sail artisan test --compact
```

### Linting / Formatting
```bash
# Format PHP code (Laravel Pint)
vendor/bin/sail pint --format agent

# Test that code is already formatted
vendor/bin/sail pint --test --format agent
```

### Opening the App
```bash
vendor/bin/sail open
```

## Development Conventions

### PHP / Laravel
- Follow Laravel 13 conventions and code style.
- Use `vendor/bin/sail artisan make:` for scaffolding (controllers, models, migrations, tests, etc.).
- Prefer Eloquent ORM, repository/service patterns for complex logic.
- Use Laravel Pint (`vendor/bin/sail pint`) before finalizing changes.
- All code must pass `vendor/bin/sail pint --test --format agent`.

### Filament (Admin)
- Admin resources live in `app/Filament/Resources/`.
- Use Filament's static `make()` methods for component initialization.
- Use `->relationship()` for BelongsTo/HasMany field binding.
- Use `->live()` for reactive field updates; `->afterStateUpdated()` with `Set $set` for cross-field updates.
- Use `Filament\Support\Icons\Heroicon` enum for icons.

### Frontend
- Blade templates in `resources/views/` with Alpine.js for interactivity.
- TailwindCSS 4 utility classes for styling.
- Run `vendor/bin/sail npm run dev` for hot-reload during development.
- Run `vendor/bin/sail npm run build` after CSS/JS changes for production.

### Testing (PHPUnit)
- Feature tests in `tests/Feature/`, unit tests in `tests/Unit/`.
- Use model factories (`database/factories/`) for test data.
- Test config in `phpunit.xml` uses SQLite in-memory DB (`testing` database).

### OAuth / Socialite
- Providers defined in `App\Enums\SocialiteProvider` (Yandex, Vkontakte).
- Credentials configured via `.env` variables.
- Callback routes: `/auth/{provider}/callback`.

### Environment
- `.env.example` is the template — all new env vars should be added there.
- Default app name: **TableBros** (`APP_NAME`).
- Default locale: **en** (`APP_LOCALE`).
- Mail driver: **log** (writes to log file, not actual SMTP).

## Key Configuration Files

| File | Purpose |
|---|---|
| `.env.example` | Environment variable template |
| `composer.json` | PHP dependencies, autoload, scripts |
| `package.json` | Node.js dependencies (Vite, Tailwind, Alpine, Flowbite) |
| `vite.config.js` | Vite build config (input: CSS + JS) |
| `compose.yaml` | Sail Docker services (PHP, MySQL, Redis) |
| `phpunit.xml` | PHPUnit bootstrap, test suites, testing env vars |
| `boost.json` | Laravel Boost MCP configuration (skills, agents) |
| `AGENTS.md` | Project-wide Boost guidelines and conventions |
