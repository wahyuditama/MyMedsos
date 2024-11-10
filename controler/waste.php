<!-- one to many melakukan banyak transaksi dalam satu kegiatan -->
<!-- one to one melakukan satu transaksi dalam satu kegiatan -->




<!-- <div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <fieldset class="border rounded-2 p-2 ">
                <legend class="float-none w-auto">Tabel Anggota</legend>
                <div class="col-sm-12">
                    <a href="index.php" class="btn btn-success" style="margin:17px;"><i class="fa-solid fa-square-plus"></i> ADD</a>
                    <a href="index.php" class="btn btn-success" style="margin:17px;"><i class="fa-solid fa-recycle"></i> RECYCLE</a>
                    <table class="table table-bordered text-center" style="margin-top:15px;margin-left:17px; width:96%; background: #E6E6FA;">
                        <th>No <i class="fa-solid fa-sort"></i></th>
                        <th>Kategori Buku <i class="fa-solid fa-sort"></i></th>
                        <th>Lokasi Rak <i class="fa-solid fa-sort"></i></th>
                        <th>Judul <i class="fa-solid fa-sort"></i></th>
                        <th>Pengarang <i class="fa-solid fa-sort"></i></th>
                        <th>Penerbit <i class="fa-solid fa-sort"></i></th>
                        <th>Tahun Terbit <i class="fa-solid fa-sort"></i></th>
                        <th>Keterangan <i class="fa-solid fa-sort"></i></th>
                        <th>Stok <i class="fa-solid fa-sort"></i></th>
                        <th>Setting <i class="fa-solid fa-sort"></i></th>
                        <tr>
                            <td>1 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>| <span class="fa-solid fa-pencil"></span></a> | | <a href="hapus_kat.php" onclick="return confirm('Yakin Ingin Menghapus Data ?')"><span class="fa-regular fa-trash-can"></span> |</a></td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div> -->

<!-- <form action="" method="post">
                        <div class="mb-3 row ">
                            <label for="anggota" class="form-label">Nama Anggota</label>
                            <select name="id_abggota" id="" class="form-control">
                                <!-- isi data diambil dari database kategori -->
<?php while ($rowKat = mysqli_fetch_assoc($queryKat)): ?>
    <option <?php echo isset($_GET['edit']) ? ($rowKat['id'] == $rowBook['id_kategori'] ? 'selected' : '') : '' ?> value="<?php echo $rowKat['id'] ?>"><?php echo $rowKat['nama_kategori'] ?></option>
<?php endwhile ?>
</select>
</div>
<div class="mb-3">
    <label for="nama" class="form-label">Judul Buku</label>
    <input type="text" class="form-control" name="nama_buku" placeholder="Masukkan Judul Buku" value="<?php echo isset($_GET['edit']) ? $rowBook['nama_buku'] : '' ?>">
</div>
<div class="mb-3">
    <label for="penerbit" class="form-label">Penerbit</label>
    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" value="<?php echo isset($_GET['edit']) ? $rowBook['penerbit'] : '' ?>">
</div>
<div class="mb-3">
    <label for="tahun" class="form-label">Tahun</label>
    <input type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" value="<?php echo isset($_GET['edit']) ? $rowBook['tahun'] : '' ?>">
</div>
<div class="mb-3">
    <label for="pengarang" class="form-label">Pengarang</label>
    <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang" value="<?php echo isset($_GET['edit']) ? $rowBook['pengarang'] : '' ?>">
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-success" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
</div>
</form> -->


