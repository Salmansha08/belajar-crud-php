<?php
include("../connection.php");

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];

    $conn = new mysqli("localhost", "root", "", "db_crud");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE tb_siswa SET nis = ?, nama = ?, kelas = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nim, $nama, $kelas, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectQuery = "SELECT * FROM tb_siswa WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/bmi-square.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                ADMIN
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
    <h1 class="text-center mt-3"><b>Edit Data Mahasiswa</b></h1>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="update-data.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nis']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $data['kelas']; ?>" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Update" onclick="return confirm('Apakah Anda yakin ingin mengubah data ini?')">
                </form>
            </div>
        </div>
    </div>
</body>

</html>