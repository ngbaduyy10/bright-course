<?php
require_once '../database/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handlePostRequest () {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'register') {
            $result = (new Auth())->register($_POST['username'], $_POST['email'], $_POST['password']);
            echo json_encode($result);
        } elseif ($_POST['action'] === 'login') {
            $result = (new Auth())->login($_POST['email'], $_POST['password']);
            echo json_encode($result);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not provided']);
    }
}