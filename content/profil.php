<?php
//menampilkan data user berdasarkan ID user
$id_user = $_SESSION['ID'];
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id_user'");
$rowUser = mysqli_fetch_assoc($queryUser);

$queryTweet = mysqli_query($koneksi, "SELECT * FROM tweet WHERE id_user='$id_user'");
$rowTweet = mysqli_fetch_assoc($queryTweet);

if (isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $deskripsi = $_POST['deskripsi'];

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

            $insert = mysqli_query($koneksi, "UPDATE user SET nama_lengkap='$nama_lengkap', nama_pengguna='$nama_pengguna', email='$email',deskripsi='$deskripsi', foto='$nama_foto' WHERE id='$id_user'");
        }
    } else {
        // Jika gambar Tidak mau diubah !!!
        $update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap='$nama_lengkap', nama_pengguna='$nama_pengguna', deskripsi='$deskripsi', email='$email' WHERE id='$id_user'");
    }
    header('location:?pg=profil&ubah=berhasil');
}

//update cover
if (isset($_POST['edit_cover'])) {

    //jika gambar mau diubah !!!
    if (!empty($_FILES['cover']['name'])) {
        $nama_cover = $_FILES['cover']['name'];
        $ukuran_cover = $_FILES['cover']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extcover = pathinfo($nama_cover, PATHINFO_EXTENSION);

        // JIKA EXTENSI cover TIDAK ADA EXT YANG TERDAFTAR DI ARRAY EXT
        if (!in_array($extcover, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else { // pindahkan gambar dari tmp folder ke folder yang sudah kita buat
            move_uploaded_file($_FILES['cover']['tmp_name'], 'upload/' . $nama_cover);

            $query = mysqli_query($koneksi, "UPDATE user SET cover='$nama_cover' WHERE id='$id_user'");
        }
    }
    header('location:?pg=profil&ubah=berhasil');
}
?>
<style>
    .botton-edit {
        margin-top: 10rem;
    }
</style>
<div class="container my-4 bg-dark">
    <div class="row">
        <div class="col-sm-12">
            <div class="cover mt-3">
                <img src="upload/<?php echo isset($rowUser['cover']) ? $rowUser['cover'] : 'https://placehold.co/600x400' ?>" width="100%" height="350" alt="" class="shadow-lg p-1 mb-5 bg-body-tertiary rounded">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="profile-header mt-5 pt-5 mx-3 text-light">
                <img src="upload/<?php echo isset($rowUser['foto']) ? $rowUser['foto'] : 'https://placehold.co/600x400' ?>" width="100" alt="" class="border border-2 border-dark rounded-circle">
                <h2 class="mt-5"><?php echo $rowUser['nama_lengkap'] ?><img src="check.png" class="mx-3" alt="" width="30" height="auto"></h2>
                <p>@<?php echo $rowUser['nama_pengguna'] ?></i></p>
                <p><?php echo $rowUser['deskripsi'] ?></p>
            </div>

        </div>
        <div class="col-sm-6 botton-edit" align="right">
            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-2"> Edit Profile</a>
            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCover"> Edit Cover</a>
        </div>
        <div class="col-sm-12 mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item justify-content-center" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Tweet</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Tweet & Balasan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Like</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><?php include 'tweet.php' ?></div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <footer class="text-center text-lg-start text-white">
            <section class="p-3 pt-0 border-top">
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <!-- Copyright -->
                        <div class="p-3">
                            © 2024 Copyright:
                            <a class="text-white" href="https://mdbootstrap.com/">Yae Publishing House</a>
                        </div>
                        <!-- Copyright -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                        <!-- Facebook -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a
                            class="btn btn-outline-light btn-floating m-1"
                            class="text-white"
                            role="button"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
        </footer>
    </div>
</div>

<!-- Modal-Edit-Profile -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $rowUser['nama_lengkap'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo $rowUser['nama_pengguna'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $rowUser['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="deskripsi" id="summernote" value="<?php echo $rowUser['deskripsi'] ?>"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal-Edit-Cover -->
<div class="modal fade" id="editCover" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Cover</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="mb-3">
                        <input type="file" name="cover">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="edit_cover">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>