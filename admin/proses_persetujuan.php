<?php
session_start();
include '../db/config.php';

$id_admin = $_SESSION['id_user'];
$id_order = $_POST['id_order'];
$action = $_POST['action'];

$status = $action == 'approve' ? 'approved' : 'rejected';

$query = "UPDATE orders SET status = ?, id_admin = ? WHERE id_order = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sii", $status, $id_admin, $id_order);
$stmt->execute();

// Redirect kembali ke halaman admin
header("Location: admin_orders.php");
exit();
?>
