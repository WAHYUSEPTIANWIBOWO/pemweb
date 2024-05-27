<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "project_web");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sel = "SELECT * FROM register WHERE username = '$username'";
    $query = mysqli_query($conn, $sel);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        $username = $result['username'];
        $email = $result['email'];
    }
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="2style.css">
</head>

<body>

    <div class="profile-container">
        <h2>Profil Pengguna</h2>
        <div class="avatar">
            <img src="avatar1.png" alt="User Profile">
        </div>
        <p>Nama Pengguna: <span id="username"><?php echo isset($username) ? $username : ''; ?></span></p>
        <p>Email: <span id="email"><?php echo isset($email) ? $email : ''; ?></span></p>

        <button onclick="window.location.href='ganti_profil.html'" class="btn">Ganti Profil</button>
        <button onclick="window.location.href='keluar.php'" class="btn">Keluar</button>
    </div>

</body>

</html>
