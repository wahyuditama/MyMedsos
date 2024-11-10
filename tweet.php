<?php

if (isset($_POST['posting'])) {
    $content = $_POST['content'];

    //jika gambar mau diubah !!!
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        // JIKA EXTENSI FOTO TIDAK ADA EXT YANG TERDAFTAR DI ARRAY EXT
        if (!in_array($extFoto, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else { // pindahkan gambar dari tmp folder ke folder yang sudah kita buat
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $insert = mysqli_query($koneksi, "INSERT INTO tweet (content,id_user,foto) VALUES ('$content','$id_user','$nama_foto')");
        }
    } else {
        // !!!
        $insert = mysqli_query($koneksi, "INSERT INTO tweet (content,id_user) VALUES ('$content','$id_user')");
    }
    header('location:?pg=profil&ubah=berhasil');
}
$queryPosting = mysqli_query($koneksi, "SELECT tweet.* from tweet  WHERE id_user ='$id_user'");

?>
<div class="row">
    <div class="col-sm-12" align="right">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Tweet</button>
    </div>

    <div class="col-sm-12 mt-3">

        <?php
        while ($rowPosting = mysqli_fetch_assoc($queryPosting)) { ?>
            <div class="d-flex mt-5 border-top border-5">
                <div class="right">
                    <img src="upload/<?php echo !empty($rowUser['foto']) ? $rowUser['foto'] : 'https://placehold.co/600x400' ?>" alt="..." width="50" class="border border-2 rounded-circle">
                </div>
                <div class="text text-light">
                    <span class="ms-3"><?php echo $rowUser['email'] ?></span>
                    <p class="ms-3"><?php echo $rowUser['nama_pengguna'] ?></p>
                </div>
            </div>

            <div class="d-flex">
                <div class="flex-grow-1 ms-3 pt-4 text-light">
                    <?php echo $rowPosting['content'] ?>

                    <?php if (!empty($rowPosting['foto'])) : ?>
                        <img src="upload/<?php echo $rowPosting['foto'] ?>" width="200" alt="">
                    <?php endif ?>
                </div>

                <?php

                ?>
                <form action="like_status.php" method="POST">
                    <!-- LIKE -->
                    <input type="hidden" name="status_id" id="status_id" value="<?php echo $rowPosting['id'] ?>">
                    <input type="hidden" name="user_id_like" id="user_id_like" value="<?php echo $rowPosting['id_user'] ?>">
                    <button class="btn btn-success btn-sm mt-2" name="klik">Like (0)</button>
                </form>


                <div class="flex-grow-1 ms-3 pt-4">
                    <form method="post" action="add_comment.php">
                        <div class="input d-flex my-2 gap-4">
                            <input type="text" class="form-control" name="status_id" placeholder="" value="<?php echo $rowPosting['id'] ?>">
                            <input type="text" class="form-control" name="user_id" placeholder=""
                                value="<?php echo isset($rowPosting['id_user']) ? $rowPosting['id_user'] : ''; ?>">
                        </div>
                        <div class="status mt-1">
                            <textarea class="form-control" name="comment_text" id="comment_text" cols-5 rows-5></textarea>
                            <button class="btn btn-primary btn-sm mt-2" type="submit">Kirim Balasan</button>

                        </div>

                    </form>
                    <div class="mt-2" id="id-comment-alert" style="display:none;"></div>
                    <div class="mt-2">
                        <?php
                        if (isset($rowPosting['id']) && isset($rowPosting['id_user'])) {
                            $idStatus = $rowPosting['id'];
                            $userId = $rowPosting['id_user'];
                            $queryComment = mysqli_query($koneksi, "SELECT * FROM  comments WHERE status_id ='$idStatus' AND user_id = '$userId'");
                            $rowCounts = mysqli_fetch_all($queryComment, MYSQLI_ASSOC);
                            // var_dump($rowCoints);
                            foreach ($rowCounts as $rowCount) {
                        ?>
                                <span>
                                    <pre>Komentar : <?php echo $rowCount['comment_text'] ?></pre>
                                </span>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>



<!-- Modal-tweet -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tweet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="summernote" placeholder="Apa yang sedang ramai dibicarakan ?!"></textarea>
                    </div>

                    <div class="mb-3">
                        <input type="file" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="posting">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- tidak terpakai -->
<!-- <script>
    function toggleLike(statusId) {
        const userID = document.getElementById('user_id_like').value;
        // console.log(userID);
        fetch("like_status.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `status_id=${statusId}&user_id=${userID}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "liked") {
                    alert("liked!");
                } else if (data.status === "unliked") {
                    alert("Unliked!");
                }
                location.reload();
            })
            .catch(error => console.error("Error:", error));
    }
</script> -->