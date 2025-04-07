<?php
require '../database/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}


function handleGetRequest() {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_users') {
            $users = (new User())->get_users();
            echo json_encode(['status' => 'success', 'data' => $users]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not provided']);
    }
}