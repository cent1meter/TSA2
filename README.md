# SwiftPOS and Tasks for Today

This CodeIgniter 4 project preserves the existing SwiftPOS customer and user pages and adds the complete IT0049 Technical Summative Assessment 2 requirements for the Tasks for Today Management System.

## TSA2 features

- Public Welcome, Task List, Profile, and About pages
- Password column on the existing users table
- Password hashing with `password_hash()` and verification with `password_verify()`
- Login and logout using CodeIgniter sessions
- Authentication filter protecting all task-management routes
- New Task form with required title and task-date validation
- Edit and update workflow with pre-filled values
- Soft delete through the `is_archived` flag
- Archived tasks excluded from both Welcome and Task List pages
- CSRF protection for login, logout, create, update, and archive forms
- Existing POS Customers and Users pages retained

## Demo account

- Username: `admin01`
- Password: `password`

Change the demo password before using this project for anything beyond the assessment.

## Local setup

Requirements: PHP 8.2 or newer, Composer, and MySQL or MariaDB.

1. Extract or clone the project.
2. Import `database/pos_database.sql` into a local MySQL server. This creates all three tables and sample records.
3. Copy `.env.example` to `.env` and enter the local database values.
4. Run:

   ```bash
   composer install
   php spark serve
   ```

5. Open `http://localhost:8080/tasks`.

You may use migrations instead of the complete SQL export:

```bash
php spark migrate
php spark db:seed PosSeeder
```

## Updating the existing InfinityFree database

The deployed POS database already contains customers and users. Import only:

```text
database/tsa2_upgrade.sql
```

This keeps the existing POS records, adds the password column, assigns the hashed demo password to `admin01`, creates the tasks table, and inserts sample tasks only when the table is empty.

The uploaded folder layout uses `htdocs/index.php` as the public front controller and keeps the CodeIgniter project inside `htdocs/Complete-CodeIgniter-POS-foundations-activity-main`. Keep the custom path in the hosted `index.php`.

Copy `public/css/styles.css` to `htdocs/css/styles.css` after future CSS changes. This package already includes the updated hosted copy.

## Access-control test

1. Log out.
2. Confirm `/`, `/tasks`, `/profile`, and `/about` open normally.
3. Open `/tasks/new`; it must redirect to `/login`.
4. Log in with the demo account; the protected page should become available.
5. Create a task with an empty title or date; validation errors must appear and entered values must remain.
6. Create a valid task and edit it.
7. Use the delete action; the database row must remain with `is_archived = 1`, while the task disappears from Welcome and Task List.
8. Log out and confirm task management is protected again.

## Main TSA2 files

- `app/Controllers/Auth.php`
- `app/Controllers/Tasks.php`
- `app/Filters/AuthFilter.php`
- `app/Models/TaskModel.php`
- `app/Views/auth/login.php`
- `app/Views/tasks/index.php`
- `app/Views/tasks/form.php`
- `app/Database/Migrations/2026-10-06-000002_AddTasksAndAuthentication.php`
- `database/tsa2_upgrade.sql`

Do not commit `.env`, hosting credentials, or production error details to GitHub.
