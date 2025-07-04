<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// mengambil dan membersihkan input dari form
	$searchQuery = trim($_POST['search']);
	$searchQuery = stripcslashes($searchQuery);
	$searchQuery = htmlspecialchars($searchQuery);

	echo "Hasil pencarian: " . $searchQuery;
}
?>