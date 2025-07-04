<?php
include("db.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi token dari POST
    if (isset($_POST['unique_id'])) {
        $username = mysqli_real_escape_string($dbb, $_POST['username']);
        $comment = mysqli_real_escape_string($dbb, $_POST['comment']);
        $date = date('Y-m-d H:i:s');
        
        if (!empty($username) && !empty($comment)) {
            $query = "INSERT INTO reviews (username, comment, date) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($dbb, $query);
            mysqli_stmt_bind_param($stmt, "sss", $username, $comment, $date);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

// Ambil data komentar
$query = "SELECT * FROM reviews ORDER BY date DESC";
$result = mysqli_query($dbb, $query);
if (!$result) {
    die("Error Query: " . mysqli_error($dbb));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Penonton</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            color: #fff;
            padding: 20px;
        }
        .reviews-container {
            max-width: 1200px;  /* Diperbesar dari 800px */
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #ff0000;
            font-size: 2.5em;  /* Ukuran judul diperbesar */
        }
        .comment-box {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 20px;
            border: 2px solid #ff0000;
        }
        .comment-box input, .comment-box textarea {
            display: block;
            width: 100%;
            padding: 20px;
            margin: 15px 0;
            border: 2px solid #ff0000;
            border-radius: 10px;
            font-size: 18px;
            background-color: #000000;
            color: #fff;
            box-sizing: border-box;
        }
        .comment-box button {
            width: 100%;
            padding: 20px;
            border: none;
            border-radius: 10px;
            background-color: #ff0000;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .comment-box button:hover {
            background-color: #cc0000;
        }
        .movie-info {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0px 4px 15px rgba(255, 0, 0, 0.3);
            border: 2px solid #ff0000;
        }
        .username {
            font-size: 24px;  /* Diperbesar dari 18px */
            font-weight: bold;
            margin-bottom: 15px;
            color: #ff0000;
        }
        .date {
            font-size: 16px;  /* Diperbesar dari 14px */
            color: #888;
            margin-bottom: 15px;
            padding: 10px;
        }
        .comment {
            font-size: 20px;  /* Diperbesar dari 16px */
            margin-bottom: 10px;
            line-height: 3.8;
        }
        .alert {
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            text-align: center;
            display: none;
            font-size: 18px;
        }
        .alert-success {
            background-color: #006400;
            color: white;
            border: 2px solid #008000;
        }
        .alert-error {
            background-color: #8b0000;
            color: white;
            border: 2px solid #ff0000;
        }
    </style>
</head>
<body>
    <div class="reviews-container">
        <h1>Ulasan Penonton (<?php echo mysqli_num_rows($result); ?>)</h1>
        
        <div id="alertSuccess" class="alert alert-success">Komentar berhasil ditambahkan!</div>
        <div id="alertError" class="alert alert-error">Terjadi kesalahan saat menambahkan komentar.</div>

        <div class="comment-box">
            <form id="commentForm" method="POST">
                <input type="hidden" name="unique_id" id="unique_id">
                <input type="text" name="username" placeholder="Nama Anda" required>
                <textarea name="comment" placeholder="Tulis komentar Anda..." required rows="4"></textarea>
                <button type="submit" onclick="return handleSubmit(event)">Kirim Komentar</button>
            </form>
        </div>

        <div id="commentsContainer">
            <?php while ($data = mysqli_fetch_array($result)): ?>
                <div class="movie-info">
                    <div class="username">Pengguna: <?php echo htmlspecialchars($data['username']); ?></div>
                    <div class="date">Tanggal: <?php echo htmlspecialchars($data['date']); ?></div>
                    <div class="comment"><?php echo nl2br(htmlspecialchars($data['comment'])); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
    // Generate unique ID untuk form submission
    document.getElementById('unique_id').value = Date.now().toString();
    
    // Simpan ID terakhir di localStorage
    let lastSubmittedId = localStorage.getItem('lastSubmittedId');
    
    function handleSubmit(event) {
        event.preventDefault();
        
        const form = document.getElementById('commentForm');
        const currentId = document.getElementById('unique_id').value;
        
        // Cek apakah form ini sudah pernah disubmit
        if (lastSubmittedId === currentId) {
            return false;
        }
        
        // Simpan ID baru
        localStorage.setItem('lastSubmittedId', currentId);
        
        // Submit form
        form.submit();
        
        // Disable button
        event.target.disabled = true;
        
        return false;
    }
    
    // Clear form history untuk mencegah resubmission
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>
</html>