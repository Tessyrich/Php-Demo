<?php


// get user

include_once ('../users.php');
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $user->getAllUsers();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}