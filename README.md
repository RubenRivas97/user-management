# User Management API

This is a RESTful API built with **Laravel 11** for managing users. It includes features like CRUD operations, filtering, pagination, authentication, observers, query scopes, and relationships (profiles & roles). It was developed as part of a backend developer evaluation.

---

# Features

- User CRUD (Create, Read, Update, Delete)  
- Pagination & filtering by name and email  
- Request validation with custom rules  
- API Resources for consistent JSON responses  
- Contracts & Services for business logic separation  
- Relationships:
- One-to-One: User → Profile  
- Many-to-Many: User ↔ Roles  
- Authentication with Laravel Sanctum  
- Middleware-protected routes  
- Model Observers (created, updated, deleted)  
- Query Scopes for cleaner filtering logic  

---

# Tech Stack

- Laravel 11  
- PHP 8.2+  
- SQLite 
- Laravel Sanctum for token-based auth  
- Postman (for testing endpoints)

---

# Setup Instructions

1. Clone the repository
```bash
git clone https://github.com/your-user/emaya-user-management.git
cd emaya-user-management
```

2. **Install dependencies**
```bash
composer install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Set up database**
```bash
touch database/database.sqlite
php artisan migrate
```

5. **Run the server**
```bash
php artisan serve
```

---

# Authentication

- Use `/api/login` to obtain a token
- Protect routes using `auth:sanctum` middleware
- Use `/api/logout` to revoke the token

---

# API Endpoints

| Method | Endpoint            | Description                  |
|--------|---------------------|------------------------------|
| GET    | /api/users          | List all users (with filter, pagination) |
| POST   | /api/users          | Create a new user            |
| GET    | /api/users/{id}     | Get user details             |
| PUT    | /api/users/{id}     | Update user                  |
| DELETE | /api/users/{id}     | Delete user                  |
| POST   | /api/login          | User login                   |
| GET    | /api/profile        | Get current authenticated user |

---

# 📘 Example Users Table

| Field        | Type     | Description              |
|--------------|----------|--------------------------|
| id           | integer  | Primary key              |
| name         | string   | Required                 |
| email        | string   | Unique, required         |
| password     | string   | Hashed using bcrypt      |
| phone_number | string   | Numeric validation       |
| created_at   | datetime | Timestamp                |

---

# Extra Features Implemented

- *Observers*: Logs user creation, update, and deletion  
- *Query Scopes*: Used for filtering by name/email  
- *Service Contracts*: `UserServiceInterface` for clean abstractions  
- *Entity Relationships*:
  - `User hasOne Profile`
  - `User belongsToMany Roles`

---

# Notes

- You can view all observers in `App\Observers\UserObserver.php`  
- UserService logic is abstracted via contract for maintainability  
- Routes are defined in `routes/api.php`