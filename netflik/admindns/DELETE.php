<?php
    $nim = $_GET['nim'];

    include("koneksi.php");

    $query = "delete from mahasiswa where nim='$nim'";
    // echo $query;
   // menghapus KE DATABASE 
    if ($conn->query($query)==true) {
        echo "<script type='text/javascript'>";
        echo "alert('Data dihapus!');";
        echo "window.location.href='index.php';";
        echo "</script>";
        
        }else{
            echo "<script type='text/Javascript'>alert('Data gagal dihapus !');</script>";
        }
?>