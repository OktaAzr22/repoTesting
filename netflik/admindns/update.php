<?php
    include("koneksi.php");

    //MENGAMBIL DATA DARI FORM
    $NIM = $_POST['NIM'];
    $NAMA = $_POST['NAMA'];
    $JURUSAN = $_POST['JURUSAN'];
    $PRODI = $_POST['PRODI'];

    //QUERY MENYIMPAN DATA KE DALAM BASIS DATA
    $query= "update mahasiswa set NAMA ='$NAMA', JURUSAN = '$JURUSAN',PRODI ='$PRODI' where NIM ='$NIM'";
    // echo $query;

    //MENYIMPAN KE DATABASE 
    if ($conn->query($query)==true) {
        echo "<script type='text/javascript'>";
        echo "alert('Data berhasil!');";
        echo "window.location.href='index.php';";
        echo "</script>";
        
        }else{
            echo "<script type='text/Javascript'>alert('Data gagal !');</script>";
        }
?>