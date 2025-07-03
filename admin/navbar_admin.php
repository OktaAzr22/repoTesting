<?php
include '../pages/auth.php';
?>

<style>
    body {
        margin: 0;
        font-family: 'Georgia', serif; /* Gaya vintage dengan font serif */
        background-color: #f5f5f5; /* Warna latar belakang terang */
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .navbar {
        display: flex;
        justify-content: space-around;
        align-items: center; /* Membuat elemen navbar rata secara vertikal */
        background-color: #f8f8f8;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        position: fixed; /* Menempel di bagian atas */
        top: 0; /* Posisi paling atas */
        width: 100%; /* Memastikan navbar memenuhi lebar halaman */
        z-index: 1000; /* Menempatkan navbar di atas elemen lain */
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 30px; /* Memberikan jarak antar menu */
        padding: 0;
        margin: 0;
    }

    .nav-links li {
        display: inline;
    }

    .nav-links li a {
        text-decoration: none;
        color: black;
        font-size: 16px;
        padding: 5px 10px;
        transition: background-color 0.3s ease;
        border-radius: 5px;
    }

    .nav-links li a:hover {
        background-color: #555;
        color: white;
    }

    .search-cart {
        display: flex; 
        align-items: center;
        margin-left: -20px; 
    }

    .search-cart .logout-icon {
        background-color: #333;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .search-cart .logout-icon:hover {
        background-color: #555;
    }

    .logo a {
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }
</style>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="#">AOU</a>
        </div>
            <ul class="nav-links">
                <li><a href="index.php" data-section="home">Home</a></li>
                <li><a href="add_produk.php" data-section="shop">Tambah Produk</a></li>
                <li><a href="pesanan.php" data-section="home">Pesanan</a></li>
                <li><a href="admin_users.php" data-section="new-arrivals">Show User</a></li>
                <li><a href="admin_review.php" data-section="home">Review</a></li>
            </ul>
        <div class="search-cart">
            <a href="../logout.php" class="logout-icon">Logout</a>
        </div>
    </nav>
</header>

