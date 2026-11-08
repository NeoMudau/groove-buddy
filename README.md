# Groove Buddy

An event discovery platform for attendees and event organisers, built with **Symfony 7** and **PostgreSQL**.

> **Status: early stage.** The project foundation is in place (data model, database, admin tooling). Authentication and the event features are next. See the [Roadmap](#roadmap).

## Screenshots

<!-- HOW TO ADD: save each image in docs/screenshots/ with the file name shown, then delete the "Screenshot to add" line and remove the comment markers around the image line. -->

**Admin dashboard (EasyAdmin, `/admin`)**

<!-- ![Admin dashboard](docs/screenshots/admin-dashboard.png) -->
> 📸 Screenshot to add: `docs/screenshots/admin-dashboard.png`

**Database diagram (users and profiles)**

<!-- ![Database diagram](docs/screenshots/database-diagram.png) -->
> 📸 Screenshot to add: `docs/screenshots/database-diagram.png`

## What is built so far

- Symfony 7.4 project on PHP 8.2+ with Doctrine ORM and a PostgreSQL 16 database running in Docker Compose (plus Mailpit for local email testing).
- A user model with two profile types, linked with Doctrine one-to-one relationships:

| Entity | Main fields |
|---|---|
| `User` | email, password, roles, verified, active, created and updated dates |
| `AttendeeProfile` | first name, last name, date of birth, phone, profile image, bio |
| `CreatorProfile` | individual or company, phone, address, profile image, bio, social media links, company name and registration number |

- A first Doctrine migration that creates the `user`, `attendee_profile`, `creator_profile` and messenger tables.
- EasyAdmin 5 installed, with the default dashboard at `/admin`. There are no management screens yet.
- Front-end tooling installed: Twig, AssetMapper, Stimulus and Turbo.

## Roadmap

Not built yet:

- [ ] Registration, login and role-based access (attendee, organiser, admin)
- [ ] Event entity with create, update and delete
- [ ] Artists linked to events
- [ ] Event images
- [ ] Favourite events
- [ ] Event views and shares, with analytics for organisers
- [ ] Bootstrap-based user interface
- [ ] Automated tests

## Tech stack

- PHP 8.2+, Symfony 7.4
- Doctrine ORM and Doctrine Migrations
- PostgreSQL 16 (Docker Compose)
- EasyAdmin 5
- Twig, AssetMapper, Stimulus, Turbo
- Mailpit (local email testing)
- PHPUnit (configured, no tests yet)

## Run it locally

**You need:** PHP 8.2+, Composer, Docker, and optionally the Symfony CLI.

1. Clone the repository:
   ```bash
   git clone https://github.com/NeoMudau/groove-buddy.git
   cd groove-buddy
   ```
2. Start the database:
   ```bash
   docker compose up -d
   ```
3. Install the dependencies:
   ```bash
   composer install
   ```
4. Point the app at PostgreSQL. The `.env` file still contains a MySQL placeholder, so create a `.env.local` file:
   ```bash
   # find the port Docker gave the database
   docker compose port database 5432
   ```
   ```env
   # .env.local  (replace PORT with the number from the command above)
   DATABASE_URL="postgresql://app:%21ChangeMe%21@127.0.0.1:PORT/app?serverVersion=16&charset=utf8"
   ```
   These are the default development credentials from `compose.yaml`. Never use them in production.
5. Create the tables:
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
6. Start the app:
   ```bash
   symfony serve
   # or: php -S localhost:8000 -t public
   ```
7. Open `http://localhost:8000/admin`.

> ⚠️ **Local use only.** There is no authentication yet, so the admin dashboard is open to anyone who can reach it.

## Tests

PHPUnit is configured, but there are no tests yet. Adding them is on the roadmap.

## About this project

Parts of the planning and documentation were prepared with the help of AI tools. All implementation decisions, the final structure and the development direction remain my responsibility.
