<?php
    include 'connection.php';
    $id = $_GET['id'];
    $query = "DELETE FROM tb_siswa WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:./pages/dashboard.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
