<?php

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $userId  = $_POST['user_id'];
    echo $statusId  = $_POST['status_id'];
    echo $commentText = mysqli_real_escape_string($koneksi, $_POST['comment_text']);


    $query = mysqli_query($koneksi, "INSERT INTO comments (status_id, user_id, comment_text)  VALUES ('$statusId','$userId','$commentText')");

    if ($query) {
        header('location: index.php?pg=profil');
        exit();
        // } else {
        //     echo json_encode(["status" => "error", "message" => "Komentar gagal ditambahkan" . mysqli_error($koneksi)]);
    }
}
