<?php
$host = 'localhost'; $dbname = 'campus_placement'; $username = 'root'; $password = '';
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) { exit('Database connection failed. Check config.php and MySQL.'); }
if (session_status() === PHP_SESSION_NONE) session_start();
function h($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function require_login() { if (empty($_SESSION['user_id'])) { header('Location: login.php'); exit; } }
function require_admin() { require_login(); if (($_SESSION['role'] ?? '') !== 'admin') { http_response_code(403); exit('Admin access required.'); } }
