<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "project_web");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM register WHERE username = '$username'";
    $hasil = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
    $data = mysqli_fetch_array($hasil);

    if ($data && $password == $data['password']) {
        $_SESSION['username'] = $username;
        echo "<script>
                alert('Login sukses');
                window.location.href = '3afterlog.html';
              </script>";
    } else {
        echo "<script>
                alert('Login gagal');
                window.location.href = '2.login.html';
              </script>";
    }

    mysqli_close($conn);
