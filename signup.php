<?php
// Cek jika form sign up telah dikirim
if(isset($_POST['signup'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

 header('Location: index.php');
  exit();
