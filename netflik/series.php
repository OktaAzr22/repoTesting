<?php
include("db.php");

// Query untuk mengambil semua data film
$query = "SELECT * FROM seriess ORDER BY id_seriess DESC LIMIT 8";
$result = mysqli_query($dbb, $query);
?>

<div class="section">
        <div class="container">
            <div class="section-header">
                Latest series
            </div>
            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                <a href="spr.php?id_seriess=<?php echo $data['id_seriess']; ?>">
                    <img src="<?php echo $data['foto']; ?>" alt="Foto">
                <div class="movie-item-content">
                    <div class="movie-item-title">
                        <?php echo $data['judul']; ?>
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
                            <span>Sutradara: <?php echo $data['sutradara']; ?></span>
                        </div>
                        <div class="movie-info">
                            <i class="bx bxs-calendar"></i>
                            <span>Tahun Rilis: <?php echo $data['tahun_rilis']; ?></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php } ?>
                <!-- END MOVIE ITEM -->
            </div>
        </div>
    </div>