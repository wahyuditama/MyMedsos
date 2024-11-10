<?php
require_once "koneksi.php";

if (isset($_POST['klik'])) {
    $status_Id = $_POST['status_id'];
    $user_Id = $_POST['user_id_like'];

    //cek likes
    $selectcheck = mysqli_query($koneksi, "SELECT * FROM likes WHERE status_id = '$status_Id' AND user_id = '$user_Id'");

    if (mysqli_num_rows($selectcheck) > 0) {
        //jika sudah ada, lakukan unlike
        $qunlike = mysqli_query($koneksi, "DELETE FROM likes WHERE status_id = '$status_Id' AND user_id = '$user_Id'");
        if ($qunlike) {
            //sukses
            $response = [
                'status' => 'unliked'
            ];
        } else {
            //gagal unlike
            $response = [
                'status' => 'error',
                'message' => 'Gagal mengunlike,'
            ];
        }
    } else {
        //jika belum ada, lakukan like
        $querylike = mysqli_query($koneksi, "INSERT INTO likes (user_id, status_id) VALUES ('$user_Id', '$status_Id')");

        if ($querylike) {
            //sukses
            $response = [
                'status' => 'liked'
            ];
        } else {
            //gagal like
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyukai,'
            ];
        }
    }
    //kirim response
    header('location: index.php?pg=profil');
    echo json_encode($response);
}
