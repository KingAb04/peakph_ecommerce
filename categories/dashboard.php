<?php
session_start();
require_once("../db.php");

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php");
    exit;
}

/* -------------------------
   TOTAL STOCK (inventory)
   ------------------------- */
$totalStock = 0;
$totalQuery = $conn->query("SELECT SUM(stock) AS total_stock FROM inventory");
if ($totalQuery && $data = $totalQuery->fetch_assoc()) {
    $totalStock = (int)($data['total_stock'] ?? 0);
}

/* -------------------------
   LOW STOCK PRODUCTS (<50)
   ------------------------- */
$lowStockProducts = [];
$lowStockQuery = $conn->query("SELECT id, product_name, stock FROM inventory WHERE stock < 50 ORDER BY stock ASC");
if ($lowStockQuery && $lowStockQuery->num_rows > 0) {
    while ($r = $lowStockQuery->fetch_assoc()) {
        $lowStockProducts[] = $r;
    }
}

/* -------------------------
   LATEST UPDATE (updated_at)
   ------------------------- */
$lastUpdate = "No records yet";
$updateQuery = $conn->query("SELECT MAX(updated_at) AS last_update FROM inventory");
if ($updateQuery && $u = $updateQuery->fetch_assoc()) {
    if (!empty($u['last_update'])) {
        $lastUpdate = date("M d, Y H:i", strtotime($u['last_update']));
    }
}

/* -------------------------
   TOTAL USERS (users table)
   ------------------------- */
$totalUsers = 0;
$userQuery = $conn->query("SELECT COUNT(*) AS total_users FROM users");
if ($userQuery && $urow = $userQuery->fetch_assoc()) {
    $totalUsers = (int)($urow['total_users'] ?? 0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - PeakPH</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../css/admin.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <!-- HEADER -->
  <header>
    <h2>Dashboard Overview</h2>
    <button onclick="logout()">Logout</button>
  </header>

  <!-- LEFT SIDEBAR -->
  <div class="sidebar">
    <h3>Menu</h3>
    <a href="dashboard.php" class="menu-link active"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="mini-view.php" class="menu-link"><i class="bi bi-pencil-square"></i> Mini View</a>
    <a href="inventorycode/inventory.php" class="menu-link"><i class="bi bi-box"></i> Inventory</a>
    <a href="orders.php" class="menu-link"><i class="bi bi-bag"></i> Orders</a>
    <a href="users.php" class="menu-link"><i class="bi bi-people"></i> Users</a>
    <a href="../admin.php" class="menu-link"><i class="bi bi-house"></i> Admin Home</a>
  </div>

  <!-- MAIN WRAPPER -->
  <div class="dashboard-container" style="margin-left:240px; margin-top:70px; display:flex; gap:20px;">

    <!-- MAIN CONTENT -->
    <div class="content" style="flex:3;">
      <h2>OVERVIEW</h2>
      <span class="last-update">Last updated <?= htmlspecialchars($lastUpdate) ?></span>

      <!-- CARDS -->
      <div class="cards">
        <div class="card stat">
          <h3>₱85,000</h3>
          <p>Total Sales</p>
        </div>

        <!-- Total Inventory -->
        <div class="card stat">
          <h3><?= number_format($totalStock); ?></h3>
          <p>Total Inventory</p>
        </div>

        <!-- Total Users (clickable) -->
        <div class="card stat" style="cursor:pointer;" onclick="window.location.href='users.php'">
          <h3><?= number_format($totalUsers); ?></h3>
          <p>Total Users</p>
        </div>

        <div class="card stat">
          <h3>1,050</h3>
          <p>Total Orders</p>
        </div>
      </div>

      <!-- CHART -->
      <div class="chart-container">
        <div class="chart-tabs">
          <button class="active">Week</button>
          <button>Month</button>
          <button>Year</button>
        </div>
        <canvas id="salesChart"></canvas>
      </div>
    </div>

    <!-- RIGHT SIDEBAR -->
    <aside class="sidebar-right">
      <div class="clock">
        <h3 id="day"></h3>
        <p class="date" id="date"></p>
        <h1 id="time"></h1>
      </div>

      <div class="notifications">
        <h3>Notifications</h3>
        <?php if (!empty($lowStockProducts)): ?>
          <?php foreach ($lowStockProducts as $p): ?>
            <div class="notif">
              <span class="tag orange">⚠️ Low Stock</span>
              <p><?= htmlspecialchars($p['product_name']); ?> has only <?= (int)$p['stock']; ?> left!</p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="notif">
            <span class="tag green">✔</span>
            <p>All products are sufficiently stocked.</p>
          </div>
        <?php endif; ?>
      </div>
    </aside>
  </div>

  <!-- JS -->
  <script src="../js/admin.js"></script>
</body>
</html>
