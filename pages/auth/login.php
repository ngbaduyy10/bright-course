<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&family=Sen:wght@400..800&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="css/user/auth.css" />
    <link rel="stylesheet" href="css/user/layout.css" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<?php
include __DIR__ . '/../../layouts/user/header.php';
?>
<div class="row auth">
    <div class="login-container col-xl-7 col-lg-8 col-md-10 col-sm-12">
        <div class="form-box row align-items-stretch">
            <div class="d-none d-sm-block col-6 p-5 welcome">
                <div class="h-100 d-flex justify-content-center align-items-center">
                    <div>
                        <h1 class="text-white mb-4">Welcome to Bright!</h1>
                        <p class="desc">To keep connected with us please sign in with your personal info</p>
                        <p class="desc mb-4">Don&apos;t have an account</p>
                        <a href="?page=register" class="sec-button">Sign Up</a>
                    </div>
                </div>
            </div>
            <form id="login-form" class="d-flex flex-column align-items-center col-12 col-sm-6 p-5">
                <h1>Sign In</h1>
                <div class="input-box">
                    <label for="email" class="d-block">Email</label>
                    <input type="email" id="email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box">
                    <label for="password" class="d-block">Password</label>
                    <input type="password" id="password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="button">Sign In</button>
                <p class="other">or login with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script src="js/auth.js" type="module"></script>
</body>
</html>
