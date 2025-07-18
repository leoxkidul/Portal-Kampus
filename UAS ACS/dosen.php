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
        $edit = mysqli_query($koneksi, "UPDATE dosen SET
            nidn = '$_POST[tnidn]',
            nama = '$_POST[tnama]',
            alamat = '$_POST[talamat]',
            fakultas = '$_POST[tfakultas]',
            prodi = '$_POST[tprodi]'
            WHERE id_dosen = '$_GET[id]'
        ");
        echo "<script>alert('" . ($edit ? "Edit data sukses" : "Edit data gagal") . "'); document.location='dosen.php';</script>";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO dosen (nidn, nama, alamat, fakultas, prodi) VALUES (
            '$_POST[tnidn]',
            '$_POST[tnama]',
            '$_POST[talamat]',
            '$_POST[tfakultas]',
            '$_POST[tprodi]'
        )");
        echo "<script>alert('" . ($simpan ? "Simpan data sukses" : "Simpan data gagal") . "'); document.location='dosen.php';</script>";
    }
}

// Proses Edit/Hapus
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id_dosen='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $vnidn = $data['nidn'];
            $vnama = $data['nama'];
            $valamat = $data['alamat'];
            $vfakultas = $data['fakultas'];
            $vprodi = $data['prodi'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM dosen WHERE id_dosen = '$_GET[id]'");
        echo "<script>alert('" . ($hapus ? "Hapus data sukses" : "Hapus data gagal") . "'); document.location='dosen.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen - UNCP</title>
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

<!-- Content -->
<div class="container">
    <br>
    <h1 class="text-center">DATA DOSEN</h1>
    <h2 class="text-center">UNIVERSITAS COKROAMINOTO PALOPO</h2>

    <!-- FORM INPUT -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-user-plus"></i> FORM INPUT DATA DOSEN
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group mb-3">
                    <label>NIDN</label>
                    <input type="text" name="tnidn" value="<?=@$vnidn?>" class="form-control" placeholder="Input NIDN (Nomor Induk Dosen Nasional)" required>
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
                    <label>Fakultas</label>
                    <select name="tfakultas" class="form-control" required>
                        <option value="<?=@$vfakultas?>"><?=@$vfakultas?></option>
                        <option value="FKIP">Fakultas Keguruan dan Ilmu Pendidikan</option>
                        <option value="FTKOM">Fakultas Teknik Komputer</option>
                        <option value="FSAINS">Fakultas Sains</option>
                        <option value="FAPERTA">Fakultas Pertanian</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Program Studi</label>
                    <input type="text" name="tprodi" value="<?=@$vprodi?>" class="form-control" placeholder="Input Program Studi" required>
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

    <!-- TABEL DOSEN -->
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            <i class="fas fa-table"></i> DAFTAR DOSEN
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr class="text-center">
                    <th>No.</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY id_dosen DESC");
                while ($data = mysqli_fetch_array($tampil)):
                ?>
                <tr>
                    <td class="text-center"><?=$no++?></td>
                    <td><?=$data['nidn']?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['alamat']?></td>
                    <td><?=$data['fakultas']?></td>
                    <td><?=$data['prodi']?></td>
                    <td class="text-center">
                        <a href="dosen.php?hal=edit&id=<?=$data['id_dosen']?>" class="btn btn-warning btn-sm" title="Edit Data">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="dosen.php?hal=hapus&id=<?=$data['id_dosen']?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" title="Hapus Data">
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
