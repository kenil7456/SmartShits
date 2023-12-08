document.addEventListener('DOMContentLoaded', function () {
    const addUserBtn = document.getElementById('addUserBtn');
    const addUserModal = document.getElementById('addUserModal');
    const closeBtns = document.getElementsByClassName('close');
    
    // Open the Add User Modal
    addUserBtn.onclick = function () {
        addUserModal.style.display = 'block';
    };

    // Close modals
    Array.from(closeBtns).forEach(function (btn) {
        btn.onclick = function () {
            addUserModal.style.display = 'none';
        };
    });

    // Close modal if outside click
    window.onclick = function (event) {
        if (event.target === addUserModal) {
            addUserModal.style.display = 'none';
        }
    };

    // Attach submit event to Add User form
    document.getElementById('addUserForm').addEventListener('submit', function (event) {
        event.preventDefault();
        submitAddUserForm();
    });

    // Load initial set of users
    loadUsersFromBackend();
});

function submitAddUserForm() {
    const userName = document.getElementById('userName').value;
    const userEmail = document.getElementById('userEmail').value;
    const userRole = document.getElementById('userRole').value;

    const userData = {
        UserName: userName,
        email: userEmail,
        role: userRole
    };

    fetch('addUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            addUserModal.style.display = 'none';
            loadUsersFromBackend();
        } else {
            alert('Failed to add user: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function loadUsersFromBackend() {
    fetch('getUsers.php')
    .then(response => response.json())
    .then(users => {
        const usersTableBody = document.getElementById('usersTable').querySelector('tbody');
        usersTableBody.innerHTML = '';
        users.forEach(user => {
            const row = usersTableBody.insertRow();
            row.innerHTML = `
                <td>${user.UserID}</td>
                <td>${user.UserName}</td>
                <td>${user.email}</td>
                <td>${user.role}</td>
                <td>
                    <button onclick="editUser(${user.UserID})">Edit</button>
                    <button onclick="deleteUser(${user.UserID})">Delete</button>
                </td>
            `;
        });
    })
    .catch(error => {
        console.error('Failed to load users:', error);
    });
}

function editUser(userId) {
    const editUserModal = document.getElementById('editUserModal');
    const editUserId = document.getElementById('editUserId'); // Ensure this is the correct ID
    const editUserName = document.getElementById('editUserName'); // Ensure this is the correct ID
    const editUserEmail = document.getElementById('editUserEmail'); // Ensure this is the correct ID
    const editUserRole = document.getElementById('editUserRole'); // Ensure this is the correct ID
    
    // Open the edit user modal
    editUserModal.style.display = 'block';
    
    // Pre-populate the form with the current user's data
    const userRow = document.getElementById(`userRow-${userId}`);
    editUserId.value = userId;
    editUserName.value = userRow.querySelector('.username').textContent; // Ensure class matches your HTML
    editUserEmail.value = userRow.querySelector('.email').textContent; // Ensure class matches your HTML
    editUserRole.value = userRow.querySelector('.role').textContent; // Ensure class matches your HTML
}

function saveUserChanges() {
    const userId = document.getElementById('editUserId').value;
    const userName = document.getElementById('editUserName').value;
    const userEmail = document.getElementById('editUserEmail').value;
    const userRole = document.getElementById('editUserRole').value;
    
    const userData = {
        UserID: userId,
        UserName: userName,
        email: userEmail,
        role: userRole
    };

    fetch('editUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('editUserModal').style.display = 'none';
            loadUsersFromBackend();
        } else {
            alert('Failed to update user: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}



function deleteUser(userId) {
    if (confirm(`Are you sure you want to delete user with ID ${userId}?`)) {
        fetch('deleteUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ UserID: userId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadUsersFromBackend();
            } else {
                alert('Failed to delete user: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}
