<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/Pijar-Camp.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="../not-found.php">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-3"><b>Data Mahasiswa</b></h1>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="insert-data.php" type="button" class="btn btn-primary">Tambah Data</a>
                <div class="card mt-3">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connection.php';
                            $no = 1;
                            $query = "SELECT * FROM tb_siswa";
                            $result = mysqli_query($conn, $query);

                            foreach ($result as $data) {
                                echo "
                                    <tr>
                                        <th scope='row' class='text-center'>" . $no++ . "</th>
                                        <td>" . $data['nis'] . "</td>
                                        <td>" . $data['nama'] . "</td>
                                        <td class='text-center'>" . $data['kelas'] . "</td>
                                        <td class='text-center'>
                                            <a href='update-data.php?id=" . $data['id'] . "' class='btn btn-warning mt-1 mb-1'>Edit</a>
                                            <a href='../delete-data.php?id=" . $data['id'] . "' class='btn btn-danger mt-1 mb-1'>Hapus</a>
                                        </td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-3 mb-3 text-center">
        <p>&copy; <span id="currentYear"></span> Salman Abdul Jabbaar Wiharja.</p>
    </footer>

</body>

</html>