<?php
include_once ('../users.php');
$user = new User();
// create user
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    if ($username && $email && $password) {
        echo $user->createUser($username, $email, $password);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    }
}else{
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}

