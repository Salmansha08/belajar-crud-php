<?php
$conn = mysqli_connect("localhost", "root", "", "db_crud");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
