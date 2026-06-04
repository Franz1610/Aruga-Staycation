# ARUGA STAYCATION

Laravel backend with a Vue 3 frontend and PostgreSQL.

## Requirements

- PHP 8.2+
- Composer
- Node.js 20.19+ or 22.12+
- PostgreSQL

## Setup

1. Configure the database in `.env`:
	- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
2. Install PHP dependencies:
	- `composer install`
3. Install frontend dependencies:
	- `npm install`
4. Generate the app key:
	- `php artisan key:generate`
5. Run migrations (once the database is ready):
	- `php artisan migrate`

## Development

- Backend: `php artisan serve`
- Frontend: `npm run dev`

## Production build

- `npm run build`
