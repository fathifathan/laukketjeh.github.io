<?php

include 'connection.php';

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $psw_user = $_POST['psw_user'];
    $email_user = $_POST['email_user'];

        //Cek agar username tidak terduplikat
        $checkUser = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($checkUser);
        if($result->num_rows>0) {
            echo "<script>alert('Username Already Exist !!'); window.location.href = './pages/login.html';</script>";
        } else {
            $insertQuery = "INSERT INTO users(username, psw_user, email_user)
                            VALUES ('$username', '$psw_user', '$email_user')";
        if ($conn->query($insertQuery) == TRUE) {
            echo "<script>alert('Congratulations your account has been successfully created.'); window.location.href = './pages/login.html';</script>";
        } else {
            echo "ERROR : ".$conn->error;
        }
        }
}
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $psw_user = $_POST['psw_user'];

    // Cek username dari database ada atau tidak
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Cek password benar atau salah
        if ($psw_user == $row['psw_user']) {
            echo "<script>alert('Login Successful !!'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Wrong Password! Please remember your password'); window.location.href = './pages/login.html';</script>";
        }
    } else {
        echo "<script>alert('Account not found! Please register first'); window.location.href = './pages/login.html';</script>";
    }
}
?>