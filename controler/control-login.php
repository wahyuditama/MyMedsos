<?php
session_start();
session_regenerate_id(true);

if (isset($_POST['login'])) {
    $users = [[
        "name" => "Doni Raharjo",
        "email" => "doni@gmail.com",
        "password" => "12345",
    ], [
        "name" => "Rano Karni",
        "email" => "rano@gmail.com",
        "password" => "123456",
    ], [
        "name" => "Dini Riani",
        "email" => "dini@gmail.com",
        "password" => "1234567",
    ], [
        "name" => "Tani Kiani",
        "email" => "tani@gmail.com",
        "password" => "12345678",
    ]];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkedLogin = false;

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['nama'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $checkedLogin = true;
            break;
        }
    }
    if ($checkedLogin) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: ../contact.php?error=login-gagal");
        exit;
    }
}
