<?php
include("db.php");

// Query untuk mengambil semua data film
$query = "SELECT * FROM movie ORDER BY id_movie";
$result = mysqli_query($dbb, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flix</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->

    <style>
        body {
            background-color: #2c2c2c;
            color: #fff;
            font-family: 'Cairo', sans-serif;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
            margin-top: 30px;
            padding: 20px;
        }

        .movie-item {
            background-color: #1c1c1c;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .movie-item:hover {
            transform: scale(1.05);
        }

        .movie-item img {
            width: 100%;
            height: 320px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .movie-item-title {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 10px;
        }

        .movie-infos {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 10px;
        }

        .movie-info {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }

        .movie-info i {
            color: #FFD700;
        }

        .movie-info span {
            color: #fff;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; font-size: 55px;">Movies</h1>
    <div class="section">
        <div class="container">
            <div class="movies-grid">
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <a href="mv.php?id_movie=<?php echo $data['id_movie']; ?>">
                    <div class="movie-item">
                        <img src="<?php echo $data['foto']; ?>" alt="Foto" onerror="this.src='default-image.jpg';">
                        <div class="movie-item-title">
                            <?php echo htmlspecialchars($data['judul']); ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $data['rating']; ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $data['durasi']; ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-user"></i>
                                <span>Sutradara: <?php echo htmlspecialchars($data['sutradara']); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-calendar"></i>
                                <span>Tahun Rilis: <?php echo $data['tahun_rilis']; ?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>