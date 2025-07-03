<?php
session_start();
include '../db/config.php';

// Pengecekan role user
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Ambil ID pesanan dari POST atau GET
$id_order = isset($_POST['id_order']) ? intval($_POST['id_order']) : (isset($_GET['id_order']) ? intval($_GET['id_order']) : 0);

if ($id_order <= 0) {
    echo "ID pesanan tidak valid.";
    exit();
}

// Periksa apakah pesanan ada
$query_check_order = "SELECT id_order FROM orders WHERE id_order = ?";
$stmt_check = $conn->prepare($query_check_order);
$stmt_check->bind_param("i", $id_order);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows == 0) {
    echo "Pesanan tidak ditemukan.";
    exit();
}

// Cek apakah ulasan sudah ada
$query = "SELECT COUNT(*) AS review_count FROM reviews WHERE id_order = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_order);
$stmt->execute();
$review_result = $stmt->get_result()->fetch_assoc();
$review_count = isset($review_result['review_count']) ? intval($review_result['review_count']) : 0;

if ($review_count > 0) {
    header("Location: my_orders.php?error=review_already_exists");
    exit();
}

// Jika metode adalah POST, proses pengiriman ulasan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['id_user'];
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $review = isset($_POST['review']) ? trim($_POST['review']) : '';

    // Validasi input
    if ($rating <= 0 || $rating > 5 || empty($review) || strlen($review) > 1000) {
        $error = "Rating harus antara 1-5, ulasan tidak boleh kosong, dan maksimal 1000 karakter.";
    } else {
        // Simpan ulasan ke database
        $query = "INSERT INTO reviews (id_order, id_user, rating, review) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiis", $id_order, $id_user, $rating, $review);
        $stmt->execute();

        // Redirect dengan parameter success=true
        header("Location: ulasan_pesanan.php?id_order=" . $id_order . "&success=true");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Ulasan untuk Pesanan #<?php echo $id_order; ?></title>
<style>
  /* Global Styles */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
  }

  /* Container untuk form ulasan */
  .review-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px; /* Membatasi lebar agar responsif */
    margin-top: 20px;
  }

  /* Heading */
  h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    color: #333;
  }

  /* Error message */
  .error-message {
    color: red;
    font-size: 14px;
    margin-bottom: 15px;
  }

  /* Form Group */
  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    border-color: #007bff;
    outline: none;
  }

  /* Button Styling */
  .btn-submit {
    width: 100%;
    padding: 12px;
    background-color: #a0522d;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .btn-submit:hover {
    background-color: #c19a6b;
  }

  /* Button Kembali */
  .btn-dashboard {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #c19a6b;
    color: white;
    border-radius: 4px;
    font-size: 16px;
    text-align: center;
  }

  .btn-dashboard:hover {
    background-color: #a0522d;
  }
</style>

</head>
<body>
    <div class="review-container">
        <h2>Beri Ulasan</h2>
        
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form action="ulasan_pesanan.php" method="POST">
    <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
    <div class="form-group">
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required placeholder="Masukkan rating Anda (1-5)">
    </div>
    <div class="form-group">
        <label for="review">Ulasan:</label>
        <textarea name="review" id="review" rows="5" required placeholder="Tulis ulasan Anda..."></textarea>
    </div>
    <button type="submit" class="btn-submit">Kirim Ulasan</button>
</form>



        <a href="my_orders.php" class="btn btn-dashboard">Kembali ke Pesanan Saya</a>
        
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <div class="thank-you-message">
        Terima kasih telah memberikan feedback yang sangat berharga bagi Aou Fashion!
    </div>
<?php endif; ?>

    </div>

    

</body>
</html>


