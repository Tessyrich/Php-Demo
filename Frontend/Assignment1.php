<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles.css">
    <title>User Management</title>
</head>
<body>

<div>
    <h2>Create User</h2>
    <form id="createUserForm" method="post">
        <input type="hidden" name="action" value="create">
        <label for="createUsername">Username:</label>
        <input type="text" id="createUsername" name="username">
        <label for="createEmail">Email:</label>
        <input type="email" id="createEmail" name="email">
        <label for="createPassword">Password:</label>
        <input type="password" id="createPassword" name="password">
        <button type="submit" id="createSubmitButton">Submit</button>
    </form>
</div>

<div>
    <h2>Update User</h2>
    <form id="updateUserForm" method="post">
        <input type="hidden" name="action" value="update">
        <label for="updateId">User ID:</label>
        <input type="number" id="updateId" name="id">
        <label for="updateUsername">Username:</label>
        <input type="text" id="updateUsername" name="username">
        <label for="updateEmail">Email:</label>
        <input type="email" id="updateEmail" name="email">
        <label for="updatePassword">Password:</label>
        <input type="password" id="updatePassword" name="password">
        <button type="submit" id="updateSubmitButton">Submit</button>
    </form>
</div>

<div>
    <h2>Delete User</h2>
    <form id="deleteUserForm" method="post">
        <input type="hidden" name="action" value="delete">
        <label for="deleteId">User ID:</label>
        <input type="number" id="deleteId" name="id">
        <button type="submit" id="deleteSubmitButton">Submit</button>
    </form>
</div>

<div>
    <h2>Get User</h2>
    <form id="getUserForm" method="post">
        <input type="hidden" name="action" value="get">
        <label for="getId">User ID:</label>
        <input type="number" id="getId" name="id">
        <button type="submit" id="getSubmitButton">Submit</button>
    </form>
    <div id="userInfo"></div>
</div>

<div>
    <h2>All Users</h2>
    <button id="getAllUsersButton">Get All Users</button>
    <div id="allUsersInfo"></div>
</div>

<script src="scripts.js"></script>

</body>
</html>
