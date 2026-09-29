<?php require_once 'config.php'; ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>CampusConnect</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="style.css" rel="stylesheet"></head><body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary"><div class="container"><a class="navbar-brand fw-bold" href="index.php">CampusConnect</a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="nav"><div class="navbar-nav ms-auto">
<a class="nav-link" href="jobs.php">Browse Jobs</a>
<?php if (!empty($_SESSION['user_id'])): ?><a class="nav-link" href="dashboard.php">Dashboard</a><?php if (($_SESSION['role']??'')==='admin'): ?><a class="nav-link" href="admin.php">Admin</a><?php endif; ?><a class="nav-link" href="logout.php">Logout</a>
<?php else: ?><a class="nav-link" href="register.php">Register</a><a class="nav-link" href="login.php">Login</a><?php endif; ?>
</div></div></div></nav><main class="container py-4">
