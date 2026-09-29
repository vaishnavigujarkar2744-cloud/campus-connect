# CampusConnect – Campus Placement Portal

CampusConnect is a PHP and MySQL-based campus placement portal that helps students discover job opportunities, apply for positions, maintain their profile and resume, and track application progress. Administrators can publish jobs and update application statuses.

## Features

### Student
- Register and log in to a student account
- Browse available job opportunities and eligibility details
- Apply for jobs
- Edit profile information, including department, graduation year, and skills
- Upload a PDF resume
- View applications and track their status

### Administrator
- Admin dashboard
- Publish job openings with company, description, eligibility, location, and deadline
- View student applications
- Update application status (Under Review, Shortlisted, Rejected, or Selected)

## Technology Stack

- PHP
- MySQL
- HTML, CSS, Bootstrap, and JavaScript
- PDO for database access
- XAMPP for local development

## Project Structure

```text
CampusConnect/
├── admin.php          # Admin dashboard, job publishing, application status updates
├── apply.php          # Job application handler
├── config.php         # Database connection and session/access helpers
├── dashboard.php      # Student dashboard
├── database.sql       # Database schema
├── footer.php         # Shared footer
├── header.php         # Shared header/navigation
├── index.php          # Home page
├── jobs.php           # Job listings
├── login.php          # Login
├── logout.php         # Logout
├── profile.php        # Student profile and resume
├── register.php       # Student registration
├── style.css          # Application styles
└── uploads/           # Resume upload directory
```

## Requirements

- Windows with [XAMPP](https://www.apachefriends.org/) (or another PHP/MySQL environment)
- PHP with PDO MySQL enabled
- MySQL/MariaDB
- A web browser

## Installation and Setup (XAMPP on Windows)

1. Install and open XAMPP.
2. Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. Extract the project ZIP.
4. Copy the extracted project folder into:

   ```text
   C:\xampp\htdocs\
   ```

   For example, if the folder is named `CampusConnect`, the main file should be at `C:\xampp\htdocs\CampusConnect\index.php`.

5. Open phpMyAdmin:

   [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

6. Import `database.sql`:
   - Select **Import** in phpMyAdmin.
   - Choose the project's `database.sql` file.
   - Click **Import** or **Go**.

   The SQL script creates and selects the `campus_placement` database and creates the `users`, `jobs`, and `applications` tables.

7. Check `config.php` and update the database connection values if your MySQL setup differs from the XAMPP defaults:

   ```php
   $host = 'localhost';
   $dbname = 'campus_placement';
   $username = 'root';
   $password = '';
   ```

8. Open the application in your browser, using the folder name you copied:

   ```text
   http://localhost/CampusConnect/
   ```

   Replace `CampusConnect` with your actual project folder name if different.

## Create an Admin Account

1. Open the registration page:

   ```text
   http://localhost/CampusConnect/register.php
   ```

2. Register your account normally.
3. In phpMyAdmin, select the `campus_placement` database and open the **SQL** tab.
4. Run the following query, replacing the email with the email used during registration:

   ```sql
   UPDATE users
   SET role = 'admin'
   WHERE email = 'your-email@example.com';
   ```

5. Log out and log in again. The Admin link/dashboard should now be available.

Keep your admin credentials private.

## Application Status Values

Applications can have the following statuses:

- Applied
- Under Review
- Shortlisted
- Rejected
- Selected

## Database Tables

- `users` – student/admin accounts, profile details, and resume path
- `jobs` – job postings and eligibility information
- `applications` – student applications and their current status

## Security and Deployment Notes

This project is intended for local learning and demonstration. Before deploying it publicly:

- Use HTTPS.
- Set a strong database password and keep credentials out of source control.
- Add CSRF protection to state-changing forms.
- Validate and restrict uploaded files (including file size and content), and store uploads in a location that cannot execute scripts.
- Review authentication, authorization, and session settings.
- Disable public error display and configure secure production logging.
- Back up the database regularly.

## License

No license is specified. Add a `LICENSE` file if you intend to distribute or reuse this project under specific terms.
