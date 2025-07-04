<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flix</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">Flix</div>
        <button class="login-btn"><a href="masuk.php"> Masuk </a></button>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Ribuan Film dan Acara TV. Tanpa Batas.</h1>
        <p>Tonton di mana saja. Batalkan kapan saja.</p>
        <button class="get-started"><a href="daftar.php">Mulai Sekarang</a></button>
    </section>

    <!-- Movie Grid Section -->
    <section class="movies">
        <h2>Populer di Netflix</h2>
        <div class="movie-grid">
            <?php

                // Data film dalam bentuk array
                $movies = [
                    ["title" => "Badarawuhi di Desa Penari", "image" => "uploads/mi5.jpg"],
                    ["title" => "MozaChiko", "image" => "uploads/se2.jpg"],
                    ["title" => "Susuk", "image" => "uploads/mi3.jpg"],
                    ["title" => "Just Mom", "image" => "uploads/f1.jpg"],
                    ["title" => "Inside Out", "image" => "uploads/a7.jpg"],
                    ["title" => "True Beauty", "image" => "uploads/se13.jpg"],
                    ["title" => "Kuasa Gelap", "image" => "uploads/t5.jpg"],
                    ["title" => "The Medium", "image" => "uploads/k6.jpg"],
                    ["title" => "Sakaratul Maut", "image" => "uploads/mi9.jpg"],
                    ["title" => "Wish", "image" => "uploads/m2.jpg"],
                    ["title" => "Saranjana", "image" => "uploads/mi2.jpg"],
                    ["title" => "Kaka bos", "image" => "uploads/p3.jpg"],
                    ["title" => "Supergirl", "image" => "uploads/supergirl.jpg"],
                    ["title" => "Transformer", "image" => "uploads/transformer.jpg"]
                ];

                // Menampilkan setiap film di dalam grid
                foreach ($movies as $movie) {
                    echo '
                    <div class="movie-card">
                        <img src="'.$movie["image"].'" alt="'.$movie["title"].'">
                        <div class="movie-title">'.$movie["title"].'</div>
                    </div>';
                }
            ?>
        </div>
        <br><br>
        <h2>Terbaru di Netflix</h2>
        <div class="movie-grid">
            <?php

                // Data film dalam bentuk array
                $movies = [
                    ["title" => "kk", "image" => "uploads/f2.jpg"],
                    ["title" => "hk", "image" => "uploads/hk.jpg"],
                    ["title" => "kang mak", "image" => "uploads/m8.jpg"],
                    ["title" => "kb", "image" => "uploads/mi8.jpg"],
                    ["title" => "Mariposa", "image" => "uploads/r2.jpg"],
                    ["title" => "kt", "image" => "uploads/re8.jpg"],
                    ["title" => "pbp", "image" => "uploads/se39.jpg"],
                    ["title" => "Tfat", "image" => "uploads/tfat.jpg"],
                    ["title" => "tt", "image" => "uploads/r8.jpg"],
                    ["title" => "mdr", "image" => "uploads/r6.jpg"],
                    ["title" => "j", "image" => "uploads/m5.jpg"],
                    ["title" => "okb", "image" => "uploads/co10.jpg"],
                    ["title" => "gangster", "image" => "uploads/co6.jpg"],
                    ["title" => "cpmr", "image" => "uploads/cpmr.jpg"]
                ];

                // Menampilkan setiap film di dalam grid
                foreach ($movies as $movie) {
                    echo '
                    <div class="movie-card">
                        <img src="'.$movie["image"].'" alt="'.$movie["title"].'">
                        <div class="movie-title">'.$movie["title"].'</div>
                    </div>';
                }
            ?>
        </div>

        <br><br>
        <h2>Drama Korea</h2>
        <div class="movie-grid">
            <?php

                // Data film dalam bentuk array
                $movies = [
                    ["title" => "j2", "image" => "uploads/j2.jpg"],
                    ["title" => "se18", "image" => "uploads/se18.jpg"],
                    ["title" => "k3", "image" => "uploads/k3.jpg"],
                    ["title" => "k5", "image" => "uploads/k5.jpg"],
                    ["title" => "mi7", "image" => "uploads/mi7.jpg"],
                    ["title" => "ph", "image" => "uploads/ph.jpg"],
                    ["title" => "se11", "image" => "uploads/se11.jpg"],
                    ["title" => "se14", "image" => "uploads/se14.jpg"],
                    ["title" => "Se15", "image" => "uploads/se15.jpg"],
                    ["title" => "se27", "image" => "uploads/se27.jpg"],
                    ["title" => "se28", "image" => "uploads/se28.jpg"],
                    ["title" => "se29", "image" => "uploads/se29.jpg"],
                    ["title" => "se23", "image" => "uploads/se23.jpg"],
                    ["title" => "se24", "image" => "uploads/se24.jpg"]
                ];

                // Menampilkan setiap film di dalam grid
                foreach ($movies as $movie) {
                    echo '
                    <div class="movie-card">
                        <img src="'.$movie["image"].'" alt="'.$movie["title"].'">
                        <div class="movie-title">'.$movie["title"].'</div>
                    </div>';
                }
            ?>
        </div>

        <br><br>
        <h2>Cartoon</h2>
        <div class="movie-grid">
            <?php

                // Data film dalam bentuk array
                $movies = [
                    ["title" => "a2", "image" => "uploads/a2.jpg"],
                    ["title" => "a3", "image" => "uploads/a3.jpg"],
                    ["title" => "a5", "image" => "uploads/a5.jpg"],
                    ["title" => "a6", "image" => "uploads/a6.jpg"],
                    ["title" => "a8", "image" => "uploads/a8.jpg"],
                    ["title" => "a10", "image" => "uploads/a10.jpg"],
                    ["title" => "m3", "image" => "uploads/m3.jpg"],
                    ["title" => "m1", "image" => "uploads/m1.jpg"],
                    ["title" => "mu3", "image" => "uploads/mu3.jpg"],
                    ["title" => "mu1", "image" => "uploads/mu1.jpg"],
                    ["title" => "mu2", "image" => "uploads/mu2.jpg"],
                    ["title" => "a4", "image" => "uploads/a4.jpg"],
                    ["title" => "ad7", "image" => "uploads/ad7.jpg"],
                    ["title" => "ad6", "image" => "uploads/ad6.jpg"]
                ];

                // Menampilkan setiap film di dalam grid
                foreach ($movies as $movie) {
                    echo '
                    <div class="movie-card">
                        <img src="'.$movie["image"].'" alt="'.$movie["title"].'">
                        <div class="movie-title">'.$movie["title"].'</div>
                    </div>';
                }
            ?>
        </div>

        <br><br>
        <h2>Horor Indonesia</h2>
        <div class="movie-grid">
            <?php

                // Data film dalam bentuk array
                $movies = [
                    ["title" => "mi1", "image" => "uploads/mi1.jpg"],
                    ["title" => "mi4", "image" => "uploads/mi4.jpg"],
                    ["title" => "mi6", "image" => "uploads/mi6.jpg"],
                    ["title" => "mi10", "image" => "uploads/mi10.jpg"],
                    ["title" => "mi3", "image" => "uploads/mi3.jpg"],
                    ["title" => "t6", "image" => "uploads/t6.jpg"],
                    ["title" => "t7", "image" => "uploads/t7.jpg"],
                    ["title" => "t4", "image" => "uploads/t9.jpg"],
                    ["title" => "re9", "image" => "uploads/re9.jpg"],
                    ["title" => "m10", "image" => "uploads/m10.jpg"],
                    ["title" => "m7", "image" => "uploads/m7.jpg"],
                    ["title" => "mi5", "image" => "uploads/mi5.jpg"],
                    ["title" => "mi8", "image" => "uploads/mi8.jpg"],
                    ["title" => "mi2", "image" => "uploads/mi2.jpg"]
                ];

                // Menampilkan setiap film di dalam grid
                foreach ($movies as $movie) {
                    echo '
                    <div class="movie-card">
                        <img src="'.$movie["image"].'" alt="'.$movie["title"].'">
                        <div class="movie-title">'.$movie["title"].'</div>
                    </div>';
                }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Netflix Clone. Semua Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>