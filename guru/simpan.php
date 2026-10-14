<?php
include "koneksi.php";

if(isset($_POST['nip'], $_POST['nama'], $_POST['alamat'])){

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO guru(nip,nama,alamat) VALUES('$nip','$nama','$alamat')");
}

header("Location: index.php");
exit;
?>
