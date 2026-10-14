<?php
include "koneksi.php";

if(isset($_POST['id_mapel'], $_POST['mapel'])){

    $id_mapel = $_POST['id_mapel'];
    $mapel = $_POST['mapel'];

    mysqli_query($koneksi, "INSERT INTO mapel(id_mapel, mapel) VALUES('$id_mapel', '$mapel')");
}

header("Location: index.php");
exit;
?>
