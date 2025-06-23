<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil Kampus - UNCP</title>
  <link rel="icon" href="logo cokro.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
                <li class="nav-item"><a class="nav-link active" href="profil.php"><i class="fa-regular fa-user-circle me-1"></i>Profil</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <div class="text-center mb-4">
        <img src="logo cokro.png" alt="Logo UCP" width="150" class="mb-3">
        <h2 class="fw-bold">UNIVERSITAS COKROAMINOTO PALOPO</h2>
        <p class="lead">Jl. Latammacelling No.19, Kota Palopo, Sulawesi Selatan</p>
    </div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-user-circle"></i> PROFIL UNIVERSITAS
        </div>
        <div class="card-body">
            <p>
                <strong>Universitas Cokroaminoto Palopo (UCP)</strong> merupakan salah satu perguruan tinggi swasta terkemuka di Sulawesi Selatan
                yang berdiri sejak tahun <strong>1967</strong>. UCP memiliki berbagai program studi unggulan di bidang pendidikan, komputer, sains, pertanian, dan lainnya.
            </p>
            <p>
                Universitas ini berkomitmen memberikan pendidikan berkualitas untuk mencetak lulusan yang berintegritas, kompeten, dan siap bersaing secara global.
            </p>

            <table class="table table-bordered mt-4">
                <tr>
                    <th style="width: 200px;"><i class="fas fa-envelope"></i> Email</th>
                    <td>info@ucp.ac.id</td>
                </tr>
                <tr>
                    <th><i class="fas fa-phone"></i> Telepon</th>
                    <td>(0471) 326999</td>
                </tr>
                <tr>
                    <th><i class="fas fa-globe"></i> Website</th>
                    <td><a href="https://ucp.ac.id" target="_blank">https://ucp.ac.id</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-white text-center py-3">
    <div class="container">
        <small>&copy; 2025 Universitas Cokroaminoto Palopo</small>
    </div>
</footer>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
