CAMPUSCONNECT SETUP
1. Install XAMPP and start Apache + MySQL.
2. Copy campus_placement_portal folder into C:\xampp\htdocs\
3. Open http://localhost/phpmyadmin and import database.sql.
4. Check config.php database settings (XAMPP default root / blank password).
5. Visit http://localhost/campus_placement_portal/register.php and create your account.
6. In phpMyAdmin SQL tab run: UPDATE users SET role='admin' WHERE email='your registered email';
7. Log out and log in again; Admin link will appear.
8. Admin publishes jobs. Student can browse, apply, edit profile, upload PDF and track status.
For deployment: use HTTPS, strong DB credentials, CSRF protection, stricter upload storage/access rules, and production error logging.
