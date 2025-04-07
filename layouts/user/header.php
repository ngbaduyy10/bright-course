<?php
session_start();
$isLogin = isset($_SESSION['user']);
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<header class="header fixed">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="w-100 d-flex align-items-center justify-content-between px-5">
            <a class="navbar-brand nav-logo" href="?page=home">Bright</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse py-3 px-5" id="navbarNav">
            <div class="mx-3">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="?page=home">Home</a>
                        <hr class="<?php echo ($page == 'home') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="?page=courses">Courses</a>
                        <hr class="<?php echo ($page == 'courses') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="#services">Blog</a>
                        <hr class="<?php echo ($page == 'blog') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                    <li class="nav-item d-block d-lg-flex">
                        <a class="nav-link" href="?page=contact">Contact</a>
                        <hr class="<?php echo ($page == 'contact') ? 'd-block' : 'd-none'; ?> w-50 m-0">
                    </li>
                </ul>
            </div>
            <?php if ($isLogin): ?>
                <div class="btn-group dropstart d-none d-lg-block">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo strtoupper($_SESSION['user']['username'][0]); ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="dropdown-item dropdown-title">Logged in as <?php echo $_SESSION['user']['username'] ?></div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-1 dropdown-content">
                                <i class="fa-solid fa-user"></i>
                                <a class="dropdown-item" href="#">Profile</a>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-1 dropdown-content">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a class="dropdown-item" href="?page=logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <a href="?page=logout" class="button button-sign-out d-lg-none">Log out</a>
            <?php else: ?>
                <a href="?page=login" class="button button-sign-up">Sign In</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
