<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders - PeakPH</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  <header>
    <h2>Orders</h2>
    <button onclick="logout()">Logout</button>
  </header>

  <div class="sidebar">
    <h3>Menu</h3>
    <a href="dashboard.php" class="menu-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="mini-view.php" class="menu-link"><i class="bi bi-pencil-square"></i> Mini View</a>
    <a href="inventorycode/inventory.php" class="menu-link"><i class="bi bi-box"></i> Inventory</a>
    <a href="orders.php" class="menu-link active"><i class="bi bi-bag"></i> Orders</a>
    <a href="users.php" class="menu-link"><i class="bi bi-people"></i> Users</a>
    <a href="../admin.php" class="menu-link"><i class="bi bi-house"></i> Admin Home</a>
  </div>

  <div class="content">
    <h2>Orders</h2>
    <p>Manage customer orders here.</p>
  </div>

  <script src="../js/admin.js"></script>
</body>
</html>
