<?php

include_once ('../users.php');
$user = new User();
// get user
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        echo $user->getUser($id);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}