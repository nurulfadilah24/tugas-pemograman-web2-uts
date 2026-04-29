<?php
$conn = mysqli_connect("localhost", "root", "", "test_db");

// ambil input user
$email = $_POST['email'];
$password = $_POST['password'];

// gunakan prepared statement (AMAN)
$stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// cek hasil
if($result->num_rows > 0){
    echo "<h2>Login Berhasil (AMAN)</h2>";
} else {
    echo "<h2>Login Gagal</h2>";
}
?>