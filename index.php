<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Fashion - Home</title>
    <style>
        body {
            margin: 0;
            font-family: "Georgia", serif;
            background-color: #f5f5f5;
        }

        .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        }

        .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f8f8f8;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo a {
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
        color: #333;
        }

        .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
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
        }

        .auth-links a {
        text-decoration: none;
        color: #fff;
        background-color: #333;
        padding: 8px 15px;
        border-radius: 5px;
        margin-left: 10px;
        transition: background-color 0.3s ease;
        }

        .auth-links a:hover {
        background-color: #555;
        }

        .main-content {
        text-align: center;
        padding: 50px;
        color: white; /* Ubah warna teks menjadi putih agar kontras dengan banner */
        background: none; /* Pastikan background-nya transparan */
        }

        .banner h1 {
        margin: 0;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8); /* Pertebal bayangan teks */
        color: white;
        font-size: 60px; /* Ubah ukuran font untuk lebih besar */
        font-weight: bold;
        animation: fadeIn 1.5s ease-in-out; /* Tambahkan animasi saat teks muncul */
        }

        .banner p {
        margin: 20px 0;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8); /* Pertebal bayangan teks */
        text-align: center;
        color: white;
        font-size: 24px; /* Sesuaikan ukuran font untuk teks paragraf */
        animation: fadeIn 2s ease-in-out; /* Tambahkan animasi saat teks muncul */
        }

        /* Animasi fade-in */
        @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px); /* Gerakkan teks dari bawah */
        }
        100% {
            opacity: 1;
            transform: translateY(0); /* Kembali ke posisi semula */
        }
        }

        /* Efek hover pada teks */
        .banner h1:hover,
        .banner p:hover {
        text-shadow: 4px 4px 10px rgba(0, 0, 0, 1); /* Perbesar bayangan saat hover */
        transform: scale(1.05); /* Sedikit perbesar teks saat hover */
        transition: all 0.3s ease; /* Animasi saat teks diperbesar */
        }

        .banner {
        background-image: url("banner2.png"); /* Pastikan path ini benar */
        background-size: cover; /* Mengisi seluruh area */
        background-position: center; /* Menempatkan gambar di tengah */
        height: 500px; /* Sesuaikan tinggi sesuai kebutuhan */
        color: white; /* Mengubah warna teks agar kontras */
        display: flex; /* Menggunakan flexbox untuk penataan */
        flex-direction: column; /* Mengatur arah isi */
        justify-content: center; /* Memusatkan isi secara vertikal */
        align-items: center; /* Memusatkan isi secara horizontal */
        }

        .welcome-text {
        font-size: 36px; /* Membuat teks lebih besar */
        text-align: center; /* Memusatkan teks */
        margin-top: 20px;
        font-weight: bold; /* Membuat teks lebih tebal */
        }

        button {
        background-color: grey;
        color: black;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        text-decoration: none; /* Menghilangkan garis bawah */
        }

        button:hover {
        background-color: white;
        }

        footer {
        background-color: #eaeaea;
        padding: 20px 0;
        font-family: "Georgia", serif;
        }

        .footer-container {
        display: flex;
        justify-content: space-around;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        }

        .footer-links {
        flex: 1;
        margin: 0 20px;
        }

        .footer-links h4 {
        font-size: 18px;
        margin-bottom: 10px;
        }

        .footer-links ul {
        list-style: none;
        padding: 0;
        }

        .footer-links ul li {
        margin: 8px 0;
        }

        .footer-links a {
        text-decoration: none;
        color: #333;
        }

        .footer-links a:hover {
        text-decoration: underline;
        }

        .footer-bottom {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #777;
        }

    </style>
</head>
<body>
   <header>
    <nav class="navbar">
        <div class="logo">
            <a href="#">AOU</a>
        </div>
        <ul class="nav-links">
            <li><a href="#" data-section="home">Home</a></li>
            <li><a href="#" data-section="shop">Women</a></li>
            <li><a href="#" data-section="shop">Men</a></li>
            <li><a href="#" data-section="sale">Aksesoris</a></li>
            <li><a href="#" data-section="sale">Collection</a></li>
        </ul>
        <div class="auth-links">
            <a href="register.php" class="register-btn">Daftar</a>
            <a href="login.php" class="login-btn">Login</a>
        </div>
    </nav>
   </header>

   <div class="banner">
    <!-- Main Content -->
    <section class="main-content">
        <h1>Selamat Datang di AOU Fashion</h1>
        <p>Lihat koleksi produk kami, tetapi Anda harus <a href="login.php">login</a> terlebih dahulu untuk membeli.</p>
    </section>
   </div>
   <style>
    footer {
            background-color: #eaeaea;
            padding: 20px 0;
            font-family: 'Georgia', serif;
        }
        .footer-container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .footer-links {
            flex: 1;
            margin: 0 20px;
        }
        .footer-links h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .footer-links ul {
            list-style: none;
            padding: 0;
        }
        .footer-links ul li {
            margin: 8px 0;
        }
        .footer-links a {
            text-decoration: none;
            color: #333;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
</style>
    <footer>
        <div class="footer-container">
            <div class="footer-links">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="terms.php">Syarat dan Ketentuan</a></li>
                    <li><a href="privacy.php">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Bantuan</h4>
                <ul>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="contact.php">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Ikuti Kami</h4>
                <ul>
                    <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                    <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 AOU. Semua hak dilindungi.
        </div>
    </footer>
</body>
</html>
