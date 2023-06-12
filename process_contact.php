<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil data yang dikirimkan melalui formulir
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $pesan = $_POST["pesan"];
  
  // Verifikasi reCAPTCHA
  $recaptcha_response = $_POST["g-recaptcha-response"];
  $secret_key = "6LfvAo8mAAAAALAbJqrJ07KzevAuE4Xaup6d5t0q";
  $ip = $_SERVER["REMOTE_ADDR"];
  
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
    'secret' => $secret_key,
    'response' => $recaptcha_response,
    'remoteip' => $ip
  );
  
  $options = array(
    'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );
  
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $response = json_decode($result);
  
  if ($response->success) {
    // reCAPTCHA berhasil diverifikasi
    // Proses formulir selanjutnya, seperti pengiriman email atau penyimpanan ke database
    
    // Contoh: Mengirim email
    $tujuan = "trewkouy@gmail.com";
    $subjek = "Pesan Kontak Dari Pembeli Anti-DDoS";
    $isiEmail = "Nama: " . $nama . "\n\n" . "Email: " . $email . "\n\n" . "Pesan: " . $pesan;
    
    // Mengirim email
    mail($tujuan, $subjek, $isiEmail);
    
    // Redirect pengguna ke halaman terima kasih setelah mengirim pesan
    header("Location: terima_kasih.html");
    exit();
  } else {
    // reCAPTCHA gagal diverifikasi
    // Tindakan yang sesuai jika reCAPTCHA tidak valid, seperti menampilkan pesan kesalahan
    echo "reCAPTCHA tidak valid. Silakan coba lagi.";
  }
}
?>
