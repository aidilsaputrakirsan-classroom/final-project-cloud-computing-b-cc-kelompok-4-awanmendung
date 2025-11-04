<?php
require 'vendor/autoload.php';

use Supabase\CreateClient;

// Ganti dengan Supabase kamu
$url = 'https://mybfahpmnpasjmhutmcr.supabase.co';
$key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g';

$client = CreateClient::create($url, $key);

// Ambil data dari form
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['pass'] ?? '';

// Validasi sederhana
if ($username && $password) {
    $data = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    $insert = $client->from('login')->insert($data)->execute();

    if ($insert && !isset($insert->error)) {
        echo "<script>
            alert('Registrasi berhasil!');
            window.location='resources/views/login/index.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Gagal mendaftar!');
            window.location='resources/views/register/index.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
        alert('Mohon isi semua kolom!');
        window.location='resources/views/register/index.php';
    </script>";
    exit;
}
?>