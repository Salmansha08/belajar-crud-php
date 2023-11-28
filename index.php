<?php
session_start();

$correctUsername = "salman";
$correctPassword = "salman123";

$loginErr = "";
$loginSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    if ($inputUsername === $correctUsername && $inputPassword === $correctPassword) {
        $_SESSION["loggedin"] = true;
        $loginSuccess = "Login Berhasil";
        header("Location: pages/dashboard.php");
        exit();
    } else {
        $loginErr = "Login gagal. Periksa kembali username dan password Anda.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center"><b>Login Account</b></h1>
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="not-found.php">Register</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3 text-right">
                                <a href="not-found.php">Forgot Password?</a>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <?php if (!empty($loginErr)) : ?>
                            <div class="alert alert-danger">
                                <?php echo $loginErr; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($loginSuccess)) : ?>
                            <div class="alert alert-success">
                                <?php echo $loginSuccess; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-3 mb-3 text-center">
        <p>&copy; <span id="currentYear"></span>Salman Abdul Jabbaar Wiharja.</p>
    </footer>
    <script>
        document.getElementById("currentYear").textContent = new Date().getFullYear();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>