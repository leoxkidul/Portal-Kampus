<?php
// Koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "akademik";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

// Proses Simpan/Edit
if (isset($_POST['bsimpan'])) {
    if (isset($_GET['hal']) && $_GET['hal'] == "edit") {
        $edit = mysqli_query($koneksi, "UPDATE staf SET
            nip = '$_POST[tnip]',
            nama = '$_POST[tnama]',
            alamat = '$_POST[talamat]',
            bagian = '$_POST[tbagian]',
            jabatan = '$_POST[tjabatan]'
            WHERE id_staf = '$_GET[id]'
        ");
        echo "<script>alert('" . ($edit ? "Edit data sukses" : "Edit data gagal") . "'); document.location='staf.php';</script>";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO staf (nip, nama, alamat, bagian, jabatan) VALUES (
            '$_POST[tnip]',
            '$_POST[tnama]',
            '$_POST[talamat]',
            '$_POST[tbagian]',
            '$_POST[tjabatan]'
        )");
        echo "<script>alert('" . ($simpan ? "Simpan data sukses" : "Simpan data gagal") . "'); document.location='staf.php';</script>";
    }
}

// Proses Edit/Hapus
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM staf WHERE id_staf='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $vnip = $data['nip'];
            $vnama = $data['nama'];
            $valamat = $data['alamat'];
            $vbagian = $data['bagian'];
            $vjabatan = $data['jabatan'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM staf WHERE id_staf = '$_GET[id]'");
        echo "<script>alert('" . ($hapus ? "Hapus data sukses" : "Hapus data gagal") . "'); document.location='staf.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staf - UNCP</title>
    <link rel="icon" href="logo cokro.png" type="image/png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
            margin: 0;
            padding-top: 70px;
        }
        .navbar {
            background: linear-gradient(90deg, #003366, #004080);
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: #FFD700 !important;
        }
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            background-color: #004080;
            border-radius: 0.5rem;
        }
        .dropdown-item {
            color: white;
            padding: 10px 20px;
        }
        .dropdown-item:hover {
            background-color: #0059b3;
            color: #FFD700;
        }
        footer {
            background-color: #003366;
            color: white;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
            <img src="logo cokro.png" alt="Logo Kampus">
            <span class="fw-bold">Universitas Cokroaminoto Palopo</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.html#beranda">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button">Input</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="dosen.php"><i class="fa-solid fa-chalkboard-user me-2"></i>Dosen</a></li>
                        <li><a class="dropdown-item" href="mahasiswa.php"><i class="fa-solid fa-user-graduate me-2"></i>Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="staf.php"><i class="fa-solid fa-user-gear me-2"></i>Staf</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="index.html#kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php"><i class="fa-regular fa-user-circle me-1"></i>Profil</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <br>
    <h1 class="text-center">DATA STAF</h1>
    <h2 class="text-center">UNIVERSITAS COKROAMINOTO PALOPO</h2>

    <!-- FORM INPUT -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-user-tie"></i> FORM INPUT DATA STAF
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group mb-3">
                    <label>NIP</label>
                    <input type="text" name="tnip" value="<?=@$vnip?>" class="form-control" placeholder="Input NIP (Nomor Induk Pegawai)" required>
                </div>
                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama Lengkap" required>
                </div>
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="talamat" class="form-control" placeholder="Input Alamat" required><?=@$valamat?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label>Bagian</label>
                    <input type="text" name="tbagian" value="<?=@$vbagian?>" class="form-control" placeholder="Contoh: Administrasi, Keuangan" required>
                </div>
                <div class="form-group mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="tjabatan" value="<?=@$vjabatan?>" class="form-control" placeholder="Contoh: Kepala TU, Staf IT" required>
                </div>
                <button type="submit" class="btn btn-success" name="bsimpan" title="Simpan Data">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="reset" class="btn btn-danger" name="breset" title="Kosongkan Form">
                    <i class="fas fa-eraser"></i> Kosongkan
                </button>
            </form>
        </div>
    </div>

    <!-- TABEL STAF -->
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            <i class="fas fa-table"></i> DAFTAR STAF UNIVERSITAS
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr class="text-center">
                    <th>No.</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Bagian</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM staf ORDER BY id_staf DESC");
                while ($data = mysqli_fetch_array($tampil)):
                ?>
                <tr>
                    <td class="text-center"><?=$no++?></td>
                    <td><?=$data['nip']?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['alamat']?></td>
                    <td><?=$data['bagian']?></td>
                    <td><?=$data['jabatan']?></td>
                    <td class="text-center">
                        <a href="staf.php?hal=edit&id=<?=$data['id_staf']?>" class="btn btn-warning btn-sm" title="Edit Data">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="staf.php?hal=hapus&id=<?=$data['id_staf']?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" title="Hapus Data">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
<footer class="text-white text-center py-3">
  <div class="container">
     <small>&copy; 2025 Universitas Cokroaminoto Palopo</small>
  </div>
</footer>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
