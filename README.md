# Groove Buddy

An event discovery platform for attendees and event organisers, built with **Symfony 7.4**, **PHP 8.2** and **PostgreSQL 16**.

> **Status: Early development.** The Symfony foundation, core user/profile entities, PostgreSQL database and first Doctrine migration are in place. Authentication, registration and event management are next. See the [Roadmap](#roadmap).

## Screenshots

<!-- HOW TO ADD: save each image in docs/screenshots/ with the file name shown, then delete the "Screenshot to add" line and remove the comment markers around the image line. -->

**Admin dashboard (EasyAdmin, `/admin`)**

<!-- ![Admin dashboard](docs/screenshots/admin-dashboard.png) -->
> 📸 Screenshot to add: `docs/screenshots/admin-dashboard.png`

**Database diagram (users and profiles)**

<!-- ![Database diagram](docs/screenshots/database-diagram.png) -->
> 📸 Screenshot to add: `docs/screenshots/database-diagram.png`

## What is built so far

- Symfony 7.4 application running on PHP 8.2+.
- Doctrine ORM and Doctrine Migrations configured.
- PostgreSQL 16 database running through Docker Compose.
- Mailpit configured for local email testing.
- EasyAdmin 5 installed, with the default dashboard available at `/admin`. Custom management screens are not yet implemented.
- Front-end tooling installed: Twig, AssetMapper, Stimulus and Turbo.

### Core entities

The initial data model consists of three entities connected through one-to-one relationships.

| Entity | Responsibilities |
|---|---|
| `User` | Account information, email, password, roles, verification status, account status and timestamps. |
| `AttendeeProfile` | Attendee personal information, including first name, last name, date of birth, phone number, profile image and bio. |
| `CreatorProfile` | Individual or company organiser information, including contact details, address, bio, social media links and relevant individual or company details. |

**Account and profile design decisions:**

- A single user account can have an attendee profile, a creator profile or both.
- Users can start as attendees and create a creator profile later.
- Both individual organisers and registered companies are supported.
- Email addresses are unique.
- New accounts default to `ROLE_ATTENDEE`, unverified and active.
- Creator profiles default to individual organisers.
- Creation and update timestamps are managed through Doctrine lifecycle callbacks.

### Database

The first Doctrine migration has been generated, reviewed and successfully executed.

The PostgreSQL database currently contains:

- `user`
- `attendee_profile`
- `creator_profile`
- `messenger_messages`
- `doctrine_migration_versions`

The database connection has been tested, and the tables have been verified using DBeaver.

## Roadmap

### Foundation
- [x] Symfony project setup
- [x] Docker Compose and PostgreSQL configuration
- [x] Core user and profile entities
- [x] Doctrine entity relationships
- [x] Initial database migration
- [x] Database verification

### Authentication and accounts
- [ ] User registration
- [ ] Password hashing and validation
- [ ] Login and logout
- [ ] Email verification
- [ ] Role-based access control (attendee, creator and admin)
- [ ] Attendee and creator profile management

### Event management
- [ ] Event entity with create, update and delete
- [ ] Artists linked to events
- [ ] Event images
- [ ] Event discovery and browsing
- [ ] Favourite events
- [ ] Event views and shares, with analytics for organisers

### Interface and quality
- [ ] Bootstrap-based user interface
- [ ] Custom EasyAdmin management screens
- [ ] Automated tests

## Tech stack

- **Backend:** PHP 8.2+, Symfony 7.4
- **Database:** PostgreSQL 16
- **ORM:** Doctrine ORM and Doctrine Migrations
- **Development environment:** Docker Compose
- **Administration:** EasyAdmin 5
- **Frontend:** Twig, AssetMapper, Stimulus and Turbo
- **Email testing:** Mailpit
- **Testing:** PHPUnit (configured; tests not yet implemented)

## Run it locally

### Requirements

- PHP 8.2+
- Composer
- Docker Desktop
- Symfony CLI (optional)
- DBeaver (optional, for database management)

### 1. Clone the repository

```bash
git clone https://github.com/NeoMudau/groove-buddy.git
cd groove-buddy
```

### 2. Configure local environment variables

Create a `.env.local` file in the project root.

Configure your local PostgreSQL credentials and connection string:

```dotenv
APP_ENV=dev
POSTGRES_DB=app
POSTGRES_USER=groovebuddy
POSTGRES_PASSWORD=your_local_password
DATABASE_URL="postgresql://${POSTGRES_USER}:${POSTGRES_PASSWORD}@127.0.0.1:52208/${POSTGRES_DB}?serverVersion=16&charset=utf8"
```

Use your own local database password. Never commit `.env.local` or publish database credentials.

### 3. Start Docker services

```bash
docker compose --env-file .env.local up -d
```

This starts PostgreSQL and Mailpit.

### 4. Install dependencies

```bash
composer install
```

### 5. Run database migrations

```bash
php bin/console doctrine:migrations:migrate
```

### 6. Start the Symfony application

Using Symfony CLI:

```bash
symfony serve
```

Alternatively:

```bash
php -S localhost:8000 -t public
```

### 7. Open the application

- Application: `http://localhost:8000`
- EasyAdmin dashboard: `http://localhost:8000/admin`

> **Security notice:** Authentication and access control have not yet been implemented. The admin dashboard must only be accessed in a trusted local development environment.

## Tests

PHPUnit is configured, but automated tests have not yet been implemented. Testing will be added as application features are developed.

## About this project

Parts of the planning and documentation were prepared with the help of AI tools. All implementation decisions, the final structure and the development direction remain my responsibility.
