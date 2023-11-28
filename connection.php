<?php
$conn = mysqli_connect("localhost", "root", "", "pijarcamp");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
