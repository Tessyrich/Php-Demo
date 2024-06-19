<?php
include_once('connection.php');

class User {
    private $ConnResult;

    public function __construct() {
        $connn = new Connection();
        $this->ConnResult = $connn->connect();
    }

    public function createUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        $result = mysqli_query($this->ConnResult, $sql);
        if ($result) {
       
            return json_encode(['status' => 'success', 'message' => 'User created successfully']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Failed to create user']);
        }
    }

    public function getUser($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->ConnResult, $sql);
        if (mysqli_num_rows($result) > 0) {
            return json_encode(mysqli_fetch_assoc($result));
        } else {
            return json_encode(['status' => 'error', 'message' => 'User not found']);
        }
    }

    public function updateUser($id, $username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = '$username', email = '$email', password = '$hashedPassword' WHERE id = $id";
        $result = mysqli_query($this->ConnResult, $sql);
        if ($result) {
            return json_encode(['status' => 'success', 'message' => 'User updated successfully']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Failed to update user']);
        }
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($this->ConnResult, $sql);
        if ($result) {
            return json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Failed to delete user']);
        }
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->ConnResult, $sql);
        $users = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
            return json_encode($users);
        } else {
            return json_encode(['status' => 'error', 'message' => 'No users found']);
        }
    }
}
?>
