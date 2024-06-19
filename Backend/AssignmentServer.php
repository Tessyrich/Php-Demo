<?php

class Users {
    public $userName;
    public $userAge;

    function createUsers($username, $userage) {
        $this->username = $username;
        $this->userage = $userage;
    }

    function setUsersName($username) {
        $this->username = $username;
    }
    function setUsersAge($userage) {
        $this->userage = $userage;
    }

    function getUsersName() {
        return $this->username;
    }
    function getUsersAge() {
        return $this->userage;
    }
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';

    if (empty($name) || empty($age)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in all fields'
        ]);
    } else {
        $users = new Users();
        $users->createUsers($name, $age);
        echo json_encode([
            'status' => 'success',
            'message' => 'User added successfully',
            'data' => [
                'name' => $users->getUsersName(),
                'age' => $users->getUsersAge()
            ]
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed'
    ]);
}
?>
