# Qwen Code Context — table-bros

## Project Overview

**table-bros** is a Laravel 13 (PHP 8.4) web application for a board game lounge / gaming room. It helps visitors browse upcoming table-top game sessions ("parties"), read community news, and sign in via social OAuth (VKontakte, Yandex). The site is primarily a content/display application with hardcoded data arrays in controllers (no database models for parties/news yet).

**Key domains:**
- Landing page with hero, games-today, community news, gallery, masters, and location sections
- Parties listing & detail pages
- News listing & detail pages
- Socialite authentication (VKontakte, Yandex) with a `/profile` page
- Error pages (403, 404, 419, 500)

**Tech stack:** Laravel 13 · PHP 8.4 · Tailwind CSS v4 · Flowbite · Alpine.js · Vite · MySQL · Redis · Laravel Sail (Docker)

## Architecture & Conventions

- **Controllers** return views with data passed as arrays (currently hardcoded, not DB-backed).
- **Models:** Only `User` exists (with Socialite columns: `socialite_provider`, `socialite_provider_id`).
- **Views:** Blade templates under `resources/views/`. Layout component at `components/layout.blade.php`. Reusable sections at `components/sections/` and `components/profile/`.
- **CSS:** `@import 'tailwindcss'` + Flowbite. Custom theme tokens: `--color-primary` (#d2a77c warm wood tone), `--color-secondary` (#0e0e0c near-black).
- **Routes:** Defined in `routes/web.php` and `routes/auth.php`. Named routes used throughout.
- **PHP style:** Explicit return types, PHPDoc blocks, PHP 8 attributes (`#[Fillable]`, `#[Hidden]`), curly braces for all control structures.
- **Code formatting:** Laravel Pint (`vendor/bin/sail pint`).

## Directory Structure (key paths)

```
app/
  Http/Controllers/   AuthController, LandingController, NewsController,
                      PartyController, ProfileController
  Models/             User
  Services/           UserService
database/
  migrations/         Users, cache, jobs + socialite columns
resources/
  views/
    components/       layout, header, footer, sections/*, profile/*, error pages
    errors/           403, 404, 419, 500
routes/
  web.php             Public routes
  auth.php            OAuth redirect/callback + logout
config/services.php   Postmark, Resend, SES, Slack, VKontakte, Yandex
```

## Building, Running & Testing

All commands must be prefixed with `vendor/bin/sail` (Sail Docker environment).

| Task | Command |
|---|---|
| Start services | `vendor/bin/sail up -d` |
| Stop services | `vendor/bin/sail stop` |
| Open in browser | `vendor/bin/sail open` |
| Dev server (hot reload) | `vendor/bin/sail npm run dev` |
| Build assets | `vendor/bin/sail npm run build` |
| Full dev stack | `vendor/bin/sail composer run dev` |
| Run tests | `vendor/bin/sail artisan test` |
| Clear config before test | `vendor/bin/sail composer run test` |
| Code formatting | `vendor/bin/sail pint --format agent` |
| List Artisan commands | `vendor/bin/sail artisan list` |
| Run tinker | `vendor/bin/sail artisan tinker` |

## Environment

Copy `.env.example` to `.env` and fill in:
- **DB:** `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- **OAuth:** `VKONTAKTE_CLIENT_ID`, `VKONTAKTE_CLIENT_SECRET`, `VKONTAKTE_REDIRECT_URI`, `YANDEX_*` equivalents
- **APP_URL** must match your deployment domain for OAuth redirects to work.

## Development Notes

- Data in `PartyController::parties()`, `LandingController::gamesToday()`, `LandingController::communityNews()`, and `NewsController` is currently **hardcoded arrays**. Future work may migrate this to database models + migrations.
- The app uses **Laravel Boost** (`laravel/boost`) for AI-assisted development. MCP tools and skills are enabled in `boost.json`.
- Views are in **Russian** (UI text, hardcoded data). The app locale is set to `en` in `.env.example` but content is Russian.
- No email/queue functionality is wired up yet (mail driver is `log`).
