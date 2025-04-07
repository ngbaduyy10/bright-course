<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ?page=404');
    exit();
}

$courseId = $_GET['course-id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&family=Sen:wght@700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/admin/sidebar.css" />
    <link rel="stylesheet" href="css/admin/course-create.css" />
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body id="admin-content">
<?php
include __DIR__ . '/../../layouts/admin/sidebar.php';
?>

<div class="course-create">
    <div class="content">
        <div class="title">
            <?php
            if ($courseId) {
                echo 'EDIT COURSE';
            } else {
                echo 'CREATE NEW COURSE';
            }
            ?>
        </div>
        <form id="courseForm" class="d-flex flex-column gap-4 mt-3">
            <div class="form-group">
                <label for="courseTitle">Title</label>
                <input type="text" class="form-control" id="courseTitle" placeholder="Enter course title" required>
            </div>
            <div class="form-group">
                <label for="courseDescription">Description</label>
                <textarea class="form-control" id="courseDescription" rows="4" placeholder="Enter course description" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="coursePrice">Price</label>
                    <input type="number" class="form-control" id="coursePrice" placeholder="Enter course price" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="courseSubject">Subject</label>
                    <select class="form-select" id="courseSubject" required>
                        <option value="" disabled selected>Select a subject</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="courseImage">Image</label>
                <input type="file" class="form-control" id="courseImage" accept="image/*">
            </div>
            <div class="row">
                <div class = "preview-image col-12 col-md-6">
                    <img class="w-100" src="" alt="" id="preview-image">
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="?page=admin-courses" class="button button-cancel">Cancel</a>
                <button type="submit" class="button">
                    <?php
                    if ($courseId) {
                        echo 'Update';
                    } else {
                        echo 'Create';
                    }
                    ?>
                </button>
            </div>
        </form>
    </div>
</div>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script src="js/course-create.js" type="module"></script>
<script src="js/admin.js" type="module"></script>
</body>
</html>

