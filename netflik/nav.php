<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="#" class="logo">
                <i class='bx bx-movie-play bx-tada main-color'></i>dnsFl<span class="main-color">i</span>x
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="#">Home</a></li>
                <li><a href="genre.php">Genre</a></li>
                <li><a href="movie.php">Movies</a></li>
                <li><a href="seriess.php">Series</a></li>
                <li style="margin-right: 10px;">
                    <!-- Search Bar Always Visible -->
                    <div class="search-bar" id="search-bar" style="display: flex; align-items: center; background-color: #111; padding: 5px; border-radius: 30px;"> 
    <form action="search.php" method="GET" style="display: flex; align-items: center;">
        <input type="text" name="query" placeholder="Search movies..." style="border: none; padding: 10px; border-radius: 30px 0 0 30px; background-color: #333; color: white; outline: none; width: 200px;" required>
        <button type="submit" style="background-color: #e50914; border: none; padding: 10px; border-radius: 0 30px 30px 0; cursor: pointer;">
            <i class="fas fa-search" style="color: white;"></i> <!-- Menggunakan ikon pencarian -->
        </button>
    </form>
</div>

                </li>
                <li>
                    <a href="keluar.php" class="btn btn-hover">
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <!-- MOBILE MENU TOGGLE -->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">