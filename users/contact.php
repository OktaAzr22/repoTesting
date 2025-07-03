<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kontak Kami - AOU</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Gaya Dasar */
       body {
            margin: 0;
            font-family: 'Georgia', serif; /* Gaya vintage dengan font serif */
            background-color: #f5f5f5; /* Warna latar belakang terang */
        }

        /* Container to limit width */
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

       .search-cart {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-cart input {
            padding: 5px;
            border: none;
            border-radius: 4px;
            outline: none;
        }

        .cart-icon {
            font-size: 20px;
            color: #fff;
            cursor: pointer;
        }
       /* CSS untuk tombol Daftar */
        .register-icon {
            font-size: 16px;
            color: #333;
            text-decoration: none;
            margin-right: 20px; /* Menambahkan jarak antara "Daftar" dan "Login" */
            border: 1px solid #333;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
            }

        .search-cart {
            display: flex;
            align-items: center;
        }

        .search-cart input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .button {
            background-color: #333;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #555;
        }
        .cart {
            font-size: 24px;
            text-decoration: none;
            color: black; /* Teks putih untuk cart */
            cursor: pointer;
        }

        #cart-toggle:checked ~ .cart-modal {
            display: block;
        }

       .cart-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .cart-content {
            position: absolute;
            top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    width: 300px;
    border-radius: 5px;
    text-align: center;
}


        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 18px;
            cursor: pointer;
            color: #333;
        }



        .cart {
            font-size: 24px;
            text-decoration: none;
            color: black; /* Teks putih untuk cart */
            cursor: pointer;
        }

        #cart-toggle:checked ~ .cart-modal {
            display: block;
        }

       .cart-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.cart-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    width: 300px;
    border-radius: 5px;
    text-align: center;
}


        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 18px;
            cursor: pointer;
            color: #333;
        }


        /* Main Container */
        .main-container {
            padding: 60px 0;
            text-align: center;
            background-color: #fff;
        }

        .main-container h1 {
            font-size: 36px;
            color: #e60000;
            margin-bottom: 20px;
        }

        .main-container p {
            font-size: 18px;
            color: #666;
        }

        /* Form Kontak */
        .contact-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            max-width: 500px;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form button {
            padding: 12px 24px;
            background-color: #e60000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #cc0000;
        }

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
</head>
<body>
    <?php include'../pages/navbar.php';?>

<!-- Modal Keranjang Belanja -->
<input type="checkbox" id="cart-toggle" style="display:none;">
<div class="cart-modal">
    <div class="cart-content">
        <span class="close-btn" onclick="toggleCart()">&times;</span>
        <h2>Keranjang Belanja</h2>
        <div id="cart-items">
            <p>Keranjang Anda kosong.</p>
        </div>
       <button onclick="checkout()">Checkout</button>
    </div>
</div>

    <div class="main-container">
        <h1>Kontak Kami</h1>
        <p>Jika Anda memiliki pertanyaan atau umpan balik, silakan isi formulir di bawah ini.</p>
        <div class="contact-form">
            <form action="submit_contact.php" method="POST">
    <input type="text" name="name" placeholder="Nama Anda" required>
    <input type="email" name="email" placeholder="Email Anda" required>
    <textarea name="message" placeholder="Pesan Anda" rows="5" required></textarea>
    <input type="hidden" name="ulasan" value="true">
    <button type="submit">Kirim</button>
</form>

        </div>
    </div>

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