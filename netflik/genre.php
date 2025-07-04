<?php
include("db.php");

// Query untuk mengambil semua data genre
$query = "SELECT * FROM genre ORDER BY id_genre DESC LIMIT 24";
$result = mysqli_query($dbb, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Grid</title>
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: bold;
            text-align: center;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            width: 80%;
            max-width: 1000px;
        }
        .genre {
            background-color: #2b2b2b;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        .genre:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

<h1>Genre</h1>

<div class="container">
    <?php while ($data = mysqli_fetch_array($result)) { ?>
        <div class="genre">
            <?php echo htmlspecialchars($data['nama_genre']); ?>
        </div>
    <?php } ?>
</div>

</body>
</html>