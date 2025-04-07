<?php
require_once '../database/courses.php';
require_once '../database/subject.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handleGetRequest() {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_courses') {
            $courses = (new Courses())->get_courses($_GET['sort'], $_GET['keyword'], $_GET['limit'], $_GET['offset'], $_GET['subjects']);
            echo json_encode(['status' => 'success', 'data' => $courses]);
        } elseif ($_GET['action'] === 'get_course_detail') {
            $course = (new Courses())->get_course_detail($_GET['id']);
            echo json_encode(['status' => 'success', 'data' => $course]);
        } elseif ($_GET['action'] === 'get_subjects') {
            $subjects = (new Subject())->get_subjects();
            echo json_encode(['status' => 'success', 'data' => $subjects]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not provided']);
    }
}

function handlePostRequest() {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create_course') {
            $result = (new Courses())->create_course($_POST['title'], $_POST['description'], $_POST['price'], $_POST['image'], $_POST['subject_id']);
            echo json_encode($result);
        } else if ($_POST['action'] === 'update_course') {
            $result = (new Courses())->update_course($_POST['id'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['image'], $_POST['subject_id']);
            echo json_encode($result);
        } else if ($_POST['action'] === 'delete_course') {
            $result = (new Courses())->delete_course($_POST['id']);
            echo json_encode($result);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not provided']);
    }
}
?>

