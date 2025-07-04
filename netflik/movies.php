<?php
include("db.php");

// Query untuk mengambil semua data film
$query = "SELECT * FROM film ORDER BY id_film DESC LIMIT 8";
$result = mysqli_query($dbb, $query);
?>

<div class="section">
    <div class="container">
        <div class="section-header">
            Latest Movies
        </div>
        <div class="movies-slide carousel-nav-center owl-carousel">
            <!-- MOVIE ITEM -->
            <?php while ($data = mysqli_fetch_array($result)) { ?>
            <a href="totd.php?id_film=<?php echo $data['id_film']; ?>">
                <div class="movie-item">
                    <!-- Menampilkan gambar dari database -->
                    <img src="<?php echo $data['foto']; ?>" alt="<?php echo htmlspecialchars($data['judul']); ?>">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php echo htmlspecialchars($data['judul']); ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo htmlspecialchars($data['rating']); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo htmlspecialchars($data['durasi']); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-user"></i>
                                <span>Sutradara: <?php echo htmlspecialchars($data['sutradara']); ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-calendar"></i>
                                <span>Tahun Rilis: <?php echo htmlspecialchars($data['tahun_rilis']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</div>