<?php


// get user

include_once ('../users.php');
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        echo $user->deleteUser($id);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}


// dleete

http://localhost/php-demo/Backend/class/users/delete.php?id=1

// get
http://localhost/php-demo/Backend/class/users/get.php

// getall
http://localhost/php-demo/Backend/class/users/getAll.php


// create
http://localhost/php-demo/Backend/class/users/create.php

// update
http://localhost/php-demo/Backend/class/users/update.php