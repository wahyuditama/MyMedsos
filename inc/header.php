<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top mb-5" style="background-color: #bee1fa; -webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px;">
    <div class="container mt-3 justify-content-center">
      <a class="navbar-brand" href="index.php"><img src="../img/2.png" width="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAltMarkup" aria-controls="navAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navAltMarkup">
        <ul class="custom-navbar-nav navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Dashboard</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=user">Manage Account</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=categories">Categories</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=book">Manage Book</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=anggota">Anggota</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=level">Level Anggota</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=pinjam">Transaksi Peminjaman</a>
          </li>
          <li>
            <a class="nav-link" href="?pg=kembali">Pengembalian</a>
          </li>
          <li>
            <a href="logout.php" class="btn btn-danger btn-sm">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>