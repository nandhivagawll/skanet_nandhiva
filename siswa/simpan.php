<?php
include "koneksi.php";

if(isset($_POST['nis'], $_POST['nama'], $_POST['alamat'])){

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO siswa(nis,nama,alamat) VALUES('$nis','$nama','$alamat')");
}

header("Location: index.php");
exit;
?>
