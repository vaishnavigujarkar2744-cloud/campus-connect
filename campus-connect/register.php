<?php
require 'config.php'; $error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $name=trim($_POST['name']??''); $email=trim($_POST['email']??''); $pass=$_POST['password']??'';
 if (!$name || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($pass)<8) $error='Enter a name, valid email, and password (8+ characters).';
 else { try {$q=$pdo->prepare('INSERT INTO users(name,email,password,department,graduation_year,skills) VALUES(?,?,?,?,?,?)');$q->execute([$name,$email,password_hash($pass,PASSWORD_DEFAULT),trim($_POST['department']??''),($_POST['graduation_year']??'')?:null,trim($_POST['skills']??'')]);header('Location: login.php?registered=1');exit;} catch(PDOException $e){$error='Email already registered.';} }
}
include 'header.php'; ?>
<div class="row justify-content-center"><div class="col-md-7 col-lg-6"><div class="card p-4"><h2>Create Student Account</h2><?php if($error):?><div class="alert alert-danger"><?=h($error)?></div><?php endif;?>
<form method="post"><label class="form-label">Full name</label><input class="form-control mb-3" name="name" required>
<label class="form-label">Email</label><input class="form-control mb-3" type="email" name="email" required>
<label class="form-label">Password (minimum 8 characters)</label><input class="form-control mb-3" type="password" name="password" minlength="8" required>
<label class="form-label">Department</label><input class="form-control mb-3" name="department" placeholder="Computer Engineering">
<label class="form-label">Graduation year</label><input class="form-control mb-3" type="number" name="graduation_year" min="2020" max="2100">
<label class="form-label">Skills</label><textarea class="form-control mb-3" name="skills" placeholder="PHP, Java, SQL..."></textarea>
<button class="btn btn-primary w-100">Register</button></form></div></div></div><?php include 'footer.php'; ?>