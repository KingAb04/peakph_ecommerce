<?php
session_start();

// Redirect to index.php if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PeakPH Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/admin.css"/>
</head>
<body>
  <!-- HEADER -->
  <header>
    <h2>PeakPH Admin Dashboard</h2>
    <button onclick="window.location.href='logout.php'">Logout</button>
  </header>

  <!-- SIDEBAR -->
  <div class="sidebar">
  <h3>Menu</h3>
  <a href="dashboard.php" class="menu-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
  <a href="mini-view.php" class="menu-link"><i class="bi bi-pencil-square"></i> Mini View</a>
  <a href="categories/inventorycode/inventory.php" class="menu-link"><i class="bi bi-box"></i> Inventory</a>
  <a href="orders.php" class="menu-link"><i class="bi bi-bag"></i> Orders</a>
  <a href="users.php" class="menu-link"><i class="bi bi-people"></i> Users</a>
</div>

  <!-- MAIN CONTENT -->
  <div class="content">
    <h2>Welcome to PeakPH Admin Panel</h2>
    <p>Select a section from the sidebar to begin.</p>
    <p> pubg Break muna sir </p>
  <script src="js/admin.js"></script>
</body>
</html>
