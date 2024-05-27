<?php 

    $nama = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "root", "", "project_web");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $simpan = "INSERT INTO register (username, email, password) VALUES ('$nama', '$email', '$password')";

    if (mysqli_query($conn, $simpan)) {
        header("Location: 2.login.html");
        exit(); 
    } else {
        echo "Error: " . $simpan . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);


