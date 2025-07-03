<?php
include '../db/config.php';

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $harga_produk = $_POST['harga_produk'];
    $stok_produk = $_POST['stok_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $diskon_produk = !empty($_POST['diskon_produk']) ? $_POST['diskon_produk'] : 0;

    // Menghitung harga diskon jika ada diskon
    $harga_diskon = $harga_produk;
    if ($diskon_produk > 0) {
        $harga_diskon = $harga_produk - ($harga_produk * ($diskon_produk / 100));
    }

    // Jika ada gambar baru yang diupload
    if (!empty($_FILES['gambar_produk']['name'])) {
        $gambar_produk = $_FILES['gambar_produk']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($gambar_produk);

        // direktori target ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Buat direktori jika belum ada
        }

        $max_size = 2 * 1024 * 1024; // 2MB
        $allowed_types = ['image/jpeg', 'image/png'];

        if ($_FILES['gambar_produk']['size'] > $max_size) {
            echo "Ukuran gambar terlalu besar. Maksimal 2MB.";
            exit;
        }

        if (!in_array($_FILES['gambar_produk']['type'], $allowed_types)) {
            echo "Format gambar tidak valid. Hanya diperbolehkan JPEG, PNG.";
            exit;
        }

        // Upload gambar baru
        if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file)) {
            // Query update jika gambar diubah
            $query = "UPDATE products 
                      SET nama='$nama_produk', id_kategori='$id_kategori', harga='$harga_produk', stok='$stok_produk', deskripsi_produk='$deskripsi_produk', diskon='$diskon_produk', harga_diskon='$harga_diskon', gambar_produk='$gambar_produk' 
                      WHERE id_produk=$id";
        } else {
            echo "Gagal mengupload gambar baru.";
            exit;
        }
    } else {
        // Query update jika gambar tidak diubah
        $query = "UPDATE products 
                  SET nama='$nama_produk', id_kategori='$id_kategori', harga='$harga_produk', stok='$stok_produk', deskripsi_produk='$deskripsi_produk', diskon='$diskon_produk', harga_diskon='$harga_diskon' 
                  WHERE id_produk=$id";
    }

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Produk berhasil diperbarui!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Gagal memperbarui produk: " . mysqli_error($conn);
    }
}
$conn->close();
?>