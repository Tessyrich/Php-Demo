document.getElementById('createSubmitButton').addEventListener('click', function(event) {
    event.preventDefault();
    const username = document.getElementById('createUsername').value;
    const email = document.getElementById('createEmail').value;
    const password = document.getElementById('createPassword').value;
    fetch('../Backend/usersbackend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'create',
            'username': username,
            'email': email,
            'password': password
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
});

document.getElementById('updateSubmitButton').addEventListener('click', function(event) {
    event.preventDefault();
    const id = document.getElementById('updateId').value;
    const username = document.getElementById('updateUsername').value;
    const email = document.getElementById('updateEmail').value;
    const password = document.getElementById('updatePassword').value;
    fetch('../Backend/usersbackend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'update',
            'id': id,
            'username': username,
            'email': email,
            'password': password
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
});

document.getElementById('deleteSubmitButton').addEventListener('click', function(event) {
    event.preventDefault();
    const id = document.getElementById('deleteId').value;
    fetch('../Backend/usersbackend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'delete',
            'id': id
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
});

document.getElementById('getSubmitButton').addEventListener('click', function(event) {
    event.preventDefault();
    const id = document.getElementById('getId').value;
    fetch('../Backend/usersbackend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'get',
            'id': id
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const userInfo = document.getElementById('userInfo');
        userInfo.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
});

document.getElementById('getAllUsersButton').addEventListener('click', function(event) {
    fetch('../Backend/usersbackend.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'getAll'
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const allUsersInfo = document.getElementById('allUsersInfo');
        allUsersInfo.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
});
