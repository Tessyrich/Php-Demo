<?php


// get user

include_once ('../users.php');
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    if ($id && $username && $email && $password) {
        echo $user->updateUser($id, $username, $email, $password);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}