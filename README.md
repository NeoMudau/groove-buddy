# 🎧 Groove Buddy

A role-based event discovery and management web application built with **Symfony 7**, **PHP 8.2**, and **PostgreSQL**.

Groove Buddy connects **event creators**, **attendees**, and **platform administrators** in one ecosystem where users can create, discover, and engage with live events.

---

## 🚀 Features

### 👤 Authentication & Roles
- Email and password authentication
- Role-based access control:
  - `ROLE_USER` → Event attendees
  - `ROLE_ADMIN` → Event creators / organizers
  - `ROLE_SUPER_ADMIN` → Platform management

---

### 🎉 Event Management
- Create, update, delete events (admins only)
- Event details:
  - Name
  - Location
  - Date & time
  - Description
  - Featured flag
  - Video / YouTube links
- Upload and manage event images
- Attach artists to events

---

### 👥 User Features
- Browse events
- View event details
- Favorite events
- Share events
- Manage personal profile (individual or company)

---

### 🎤 Artist System
- Create and manage artists
- Link artists to events
- Add social media links for artists

---

### ❤️ Engagement System
- Favorite events
- Track event views
- Track shares
- Event analytics per organizer

---

### 📊 Admin Features
- Admin dashboard
- Event analytics (views, favorites, shares)
- User management (super admin)
- Role management

---

## 🧱 Tech Stack

### Backend
- PHP 8.2
- Symfony 7
- Doctrine ORM
- PostgreSQL

### Frontend
- Twig (server-side rendering)
- Bootstrap 5

### Security
- Symfony Security Bundle
- Password hashing (Argon2 / bcrypt)
- JWT authentication (optional)

### Supporting Packages
- Symfony Serializer
- Symfony Validator
- Doctrine Migrations
- Symfony Mailer
- Monolog

---

## 🗄️ Database Structure (Core Entities)

- User
- Profile
- Event
- Artist
- EventArtist (Many-to-Many)
- EventImage
- Favorite
- EventAnalytics
- SocialMedia

---

## 🔐 Roles & Permissions

| Role | Description |
|------|-------------|
| USER | Browse and engage with events |
| ADMIN | Create and manage events |
| SUPER_ADMIN | Full system control |

---

## 📡 API Endpoints (Overview)

### Authentication
- `POST /api/auth/register`
- `POST /api/auth/login`

### Events
- `GET /api/events`
- `GET /api/events/{id}`
- `POST /api/events`
- `PUT /api/events/{id}`
- `DELETE /api/events/{id}`

### Favorites
- `POST /api/events/{id}/favorite`
- `DELETE /api/events/{id}/favorite`
- `GET /api/users/me/favorites`

### Profiles
- `POST /api/profile`
- `GET /api/profile/{id}`

### Admin
- `GET /api/admin/dashboard`
- `GET /api/admin/events/{id}/analytics`
