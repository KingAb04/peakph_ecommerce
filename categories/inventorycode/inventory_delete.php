<?php
session_start();
require_once("../../db.php");

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../../index.php");
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM inventory WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: inventory.php?status=deleted");
        exit;
    } else {
        echo "❌ Error deleting product: " . $conn->error;
    }
} else {
    echo "⚠️ Invalid request. No product ID provided.";
}
