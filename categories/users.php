<?php
session_start();
require_once("../db.php");

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: ../index.php");
  exit;
}

// Handle Add User form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("INSERT INTO users (username, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $username, $email, $password, $role, $status);
  $stmt->execute();
  $stmt->close();

  header("Location: users.php?status=added");
  exit;
}

// Fetch all users
$users = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users - PeakPH</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  <!-- HEADER -->
  <header>
    <h2>User Management</h2>
    <button onclick="logout()">Logout</button>
  </header>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h3>Menu</h3>
    <a href="dashboard.php" class="menu-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="mini-view.php" class="menu-link"><i class="bi bi-pencil-square"></i> Mini View</a>
    <a href="inventorycode/inventory.php" class="menu-link"><i class="bi bi-box"></i> Inventory</a>
    <a href="orders.php" class="menu-link"><i class="bi bi-bag"></i> Orders</a>
    <a href="users.php" class="menu-link active"><i class="bi bi-people"></i> Users</a>
    <a href="../admin.php" class="menu-link"><i class="bi bi-house"></i> Admin Home</a>
  </div>

  <!-- MAIN CONTENT -->
  <div class="content">
    <h2>User Accounts</h2>

    <!-- Status Message -->
    <?php if (isset($_GET['status']) && $_GET['status'] === 'added'): ?>
      <p style="color: green; font-weight: bold;">✅ User added successfully!</p>
    <?php endif; ?>

    <!-- Search + Add -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; flex-wrap:wrap; gap:10px;">
      <input type="text" id="searchUser" placeholder="🔍 Search user by name or email..." style="padding:8px; flex:1; border:1px solid #27ae60; border-radius:6px;">
      <button onclick="openModal()" style="background:#27ae60; color:#fff; border:none; padding:10px 15px; border-radius:6px; cursor:pointer; font-weight:600;">+ Add User</button>
    </div>

    <!-- User Table -->
    <table>
      <thead>
        <tr>
          <th>User ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="usersTable">
        <?php if ($users && $users->num_rows > 0): ?>
          <?php while ($row = $users->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><?= htmlspecialchars($row['username']); ?></td>
              <td><?= htmlspecialchars($row['email']); ?></td>
              <td><?= htmlspecialchars($row['role']); ?></td>
              <td><?= htmlspecialchars($row['status']); ?></td>
              <td>
                <button class="edit-btn" onclick="editUser(<?= $row['id']; ?>)">Edit</button>
                <button class="delete-btn" onclick="deleteUser(<?= $row['id']; ?>)">Delete</button>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6" style="text-align:center;">No users found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal (Add User) -->
  <div class="modal" id="userModal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2>Add New User</h2>
      <form method="POST" action="">
        <input type="hidden" name="add_user" value="1">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label>
        <select name="role">
          <option value="User">User</option>
          <option value="Admin">Admin</option>
        </select>

        <label>Status</label>
        <select name="status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>

        <button type="submit">Add User</button>
      </form>
    </div>
  </div>

  <!-- JS -->
  <script>
    // Search filter
    document.getElementById("searchUser").addEventListener("keyup", function() {
      const value = this.value.toLowerCase();
      const rows = document.querySelectorAll("#usersTable tr");
      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(value) ? "" : "none";
      });
    });

    // Modal functions
    function openModal() {
      document.getElementById("userModal").style.display = "flex";
    }
    function closeModal() {
      document.getElementById("userModal").style.display = "none";
    }
    window.onclick = function(e) {
      if (e.target == document.getElementById("userModal")) closeModal();
    }

    // Dummy functions for edit/delete
    function editUser(id) {
      alert("Edit user with ID: " + id);
    }
    function deleteUser(id) {
      if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "users_delete.php?id=" + id;
      }
    }
  </script>
</body>
</html>
