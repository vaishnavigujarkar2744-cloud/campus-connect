CREATE DATABASE IF NOT EXISTS campus_placement;
USE campus_placement;
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(150) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role ENUM('student','admin') NOT NULL DEFAULT 'student',
 department VARCHAR(100), graduation_year INT, skills TEXT, resume VARCHAR(255),
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE jobs (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(150) NOT NULL, company VARCHAR(150) NOT NULL,
 description TEXT NOT NULL, eligibility TEXT, location VARCHAR(120),
 deadline DATE, created_by INT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY(created_by) REFERENCES users(id) ON DELETE SET NULL
);
CREATE TABLE applications (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL, job_id INT NOT NULL,
 status ENUM('Applied','Under Review','Shortlisted','Rejected','Selected') DEFAULT 'Applied',
 applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 UNIQUE KEY one_application(user_id,job_id),
 FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
 FOREIGN KEY(job_id) REFERENCES jobs(id) ON DELETE CASCADE
);
-- After registering your account, make it admin by running:
-- UPDATE users SET role='admin' WHERE email='your-email@example.com';
