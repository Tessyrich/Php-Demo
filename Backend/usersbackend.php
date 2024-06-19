<?php
include_once('./class/users.php');

$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? null;
    if ($action) {
        switch ($action) {
            case 'create':
                $username = $_POST['username'] ?? null;
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;
                if ($username && $email && $password) {
                    echo $user->createUser($username, $email, $password);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
                }
                break;
            case 'update':
                $id = $_POST['id'] ?? null;
                $username = $_POST['username'] ?? null;
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;
                if ($id && $username && $email && $password) {
                    echo $user->updateUser($id, $username, $email, $password);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
                }
                break;
            case 'delete':
                $id = $_POST['id'] ?? null;
                if ($id) {
                    echo $user->deleteUser($id);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
                }
                break;
            case 'get':
                $id = $_POST['id'] ?? null;
                if ($id) {
                    echo $user->getUser($id);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
                }
                break;
            case 'getAll':
                echo $user->getAllUsers();
                break;
            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
                break;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No action specified']);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed',
        'method' => $_SERVER['REQUEST_METHOD'], // Add this line to debug the request method
        'post_data' => $_POST // Include POST data for debugging
    ]);
}
?>
