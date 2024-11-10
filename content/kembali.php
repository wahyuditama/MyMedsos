<?php
$peminjaman = mysqli_query($koneksi, "SELECT peminjaman.kode_buku, pengembalian.* FROM pengembalian LEFT JOIN peminjaman ON peminjaman.id = pengembalian.id_peminjaman ORDER BY id DESC");

?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3">Data Pengembalian</legend>
                    <div align="right">
                        <a href="?pg=tambah_kembali" class="btn btn-success"><i class="fa-solid fa-square-plus"></i> ADD</a>
                        <a href="index.php" class="btn btn-success"><i class="fa-solid fa-recycle"></i> RECYCLE</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hovered" style="margin-top:15px;margin-left:17px; width:96%; background: #E6E6FA;">
                            <thead>
                                <tr>
                                    <th>No <i class="fa-solid fa-sort ms-6"></i></th>
                                    <th>No Peminjaman <i class="fa-solid fa-sort ms-6"></i></th>
                                    <th>Status <i class="fa-solid fa-sort"></i></i></th>
                                    <th>Denda <i class="fa-solid fa-sort"></i></th>
                                    <th>Aksi <i class="fa-solid fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($rowQuery = mysqli_fetch_assoc($peminjaman)): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rowQuery['kode_buku'] ?></td>
                                        <td><?php echo $rowQuery['status'] ?></td>
                                        <td><?php echo $rowQuery['denda'] ?></td>
                                        <td>| <a href="?pg=tambah_kembali&detail=<?php echo $rowQuery['id'] ?>"><span class="fa-solid fa-pencil"></span></a> | |
                                            <a href="?pg=tambah_kembali&delete=<?php echo $rowQuery['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')"><span class="fa-regular fa-trash-can"></span> |</a></button>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>