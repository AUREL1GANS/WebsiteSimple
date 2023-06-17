<?php
// Cek jika form login telah dikirim
if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Proses validasi login dan verifikasi data ke database

  // Misalnya, lakukan pengecekan di tabel pengguna
  // $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  // Eksekusi query dan periksa hasilnya

  // Jika login berhasil, arahkan pengguna ke halaman selamat datang
  // Jika login gagal, tampilkan pesan error atau arahkan kembali ke halaman login


  // Alihkan pengguna ke halaman terakhir yang dikunjungi
header('Location: index.php');

  exit();