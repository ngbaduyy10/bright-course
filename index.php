<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include './pages/user/home.php';
        break;

    case 'courses':
        include './pages/user/courses.php';
        break;

    case 'detail':
        include './pages/user/detail.php';
        break;

    case 'contact':
        include './pages/user/contact.php';
        break;

    case 'admin-courses':
        include './pages/admin/admin-courses.php';
        break;

    case 'user':
        include './pages/admin/user.php';
        break;

    case 'course-create':
        include './pages/admin/course-create.php';
        break;

    case 'login':
        include './pages/auth/login.php';
        break;

    case 'register':
        include './pages/auth/register.php';
        break;

    case 'logout':
        include './pages/auth/logout.php';
        break;

}