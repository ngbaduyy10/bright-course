<?php
require '../database/info.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handleGetRequest() {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_address_iframe') {
            $address_iframe = (new Info())->get_address_iframe();
            echo json_encode(['status' => 'success', 'data' => $address_iframe]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not provided']);
    }
}
