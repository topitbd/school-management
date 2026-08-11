# AGENTS.md

Laravel 13 app (PHP ^8.3) + Tailwind CSS v4 via Vite. Custom-built admin panel with a Windster template (Flowbite-style) UI. No auth scaffold (Breeze/Jetstream) — login is custom.

## Commands
- Admin routes: `php artisan route:list --path=admin` (verifies registered admin routes/names)
- Compile blades / catch blade errors: `php artisan view:cache`
- CSS build: `npm run build` (Tailwind v4 + Vite). Dev: `npm run dev`; a `public/hot` file means the Vite dev server is/was running.
- Tests (Pest): `php artisan test`
- Lint: `vendor/bin/pint` (no pint.json; defaults apply)
- Full dev env: `composer run dev` (concurrently serves PHP, queue worker, Vite)
- DB is MySQL `school_management` (see `.env`).

## Routing & auth (important)
- All admin routes live in **`routes/admin.php`** and are loaded via `AppServiceProvider::register()` → `loadRoutesFrom()`, NOT in `routes/web.php` or bootstrap routing. Do not add admin routes to `web.php`.
- Route names use the `admin.*` prefix, e.g. `admin.users.view`, `admin.users.createPage`, `admin.users.create`, `admin.users.edit`, `admin.users.update`, `admin.users.delete`, `admin.users-roles.view`, `admin.dashboard.view`, `admin.login.post`, `admin.logout`.
- Every admin route is wrapped in `AdminMiddleware` (inside `routes/admin.php`). It requires login, redirects to `admin.login.index`, and enforces permissions from `Auth::user()->Role->permissions` (CSV string). The `Super Admin` role bypasses the permission check.
- `Auth::user()` is always available on admin pages (middleware guarantees it).
- On first visit to the login page, `LoginController@index` auto-creates a default user if `users` is empty: **`admin@gmail.com` / `123456`** (role_id 1 = Super Admin).
- Login form posts to `admin.login.post` with `email` + `password`.

## Views / layout conventions
- Admin pages extend `admin.layouts.main` and put content in `@section('content')`.
- Layout (`resources/views/admin/layouts/`): `main`, `navbar`, `sidebar`. Navbar holds the dark-mode toggle and the logged-in user dropdown; `show_image(Auth::user()->images)` falls back to `public/assets/placeholder/400x400.png` (keep this file).
- **Icons are Lucide** via CDN: `<i data-lucide="icon-name"></i>`. `lucide.createIcons()` runs in the layout's inline script. If the CDN is blocked/offline, `lucide` is undefined and `lucide.createIcons()` throws — which kills the rest of the layout script (including dropdown toggles). Order matters: sidebar dropdown handlers are attached via `[data-sidebar-toggle]` after `lucide.createIcons()`.
- **Sidebar is fully dynamic**: generated from `sidebarList()` in `app/Helpers/helper.php`. Item shapes: `'route'` key → simple link; array of child items (no `route`) → collapsible dropdown; `'hr' => null` → divider. Add/remove menu entries there. Icon values are Lucide names. `Route::has()` guards links so a bad route name can't crash rendering.

## Dark mode
- Class-based, enabled via `@custom-variant dark (&:where(.dark, .dark *));` in `resources/css/app.css`.
- The `.dark` class is set on `<html>` and persisted to `localStorage['theme']` (inline script in `<head>` avoids FOUC).
- Always add `dark:` variants to new UI (bg/border/text), and `dark:hover:`/`dark:focus:` for state variants.

## Helpers (`app/Helpers/helper.php`, autoloaded via composer `files`)
- `has_permission($route)` / `has_permissions([...])` — read `roles.permissions` CSV.
- `show_image($images)` — returns stored webp/original URL or placeholder.
- `upload_file()` — **uses `Spatie\Image\Image`, which is NOT in composer.json/vendor**. Avatar uploads via this helper will fatal. Do not depend on it until the package is added.
- `get_route_lists()` — derives admin route groups from registered routes; used by `RouteListSeeder`.

## Data model / seeding
- `users` table has custom columns: `username`, `phone`, `date_of_birth`, `gender`, `country`, `city`, `zip`, `address`, `status` (Active/Inactive/Banned), `role_id`, `images` (JSON cast), `locale`. `date_of_birth` is NOT cast to a date.
- `roles` table: `name`, `slug`, `description`, `permissions` (CSV), `status`. The `Role` model has a global scope excluding `Super Admin`; `UserController@index` also excludes `role_id` 1.
- `database/seeders/DatabaseSeeder` runs `RouteListSeeder`, `RoleSeeder`, `UserSeeder`.

## Reference template
- `public/tailwind-dashboard-windster-main/` is the static Windster source template (HTML + partials). Copy markup from its `content/**/*.html` into `resources/views/admin` blades; it is not part of the app.
