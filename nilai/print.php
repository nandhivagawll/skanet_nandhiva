
<?php

include "koneksi.php";

$nis = isset($_GET['nis']) ? $_GET['nis'] : "";

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Data Nilai</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .nama {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #077210;
            color: white;
            padding: 10px;
            border: 1px solid black;
        }

        td {
            padding: 8px;
            border: 1px solid black;
        }

        .center {
            text-align: center;
        }

        @media print {

            .no-print {
                display: none;
            }

        }

    </style>

</head>

<body>

<?php

if ($nis != "") {

    // PRINT SATU SISWA

    $query = mysqli_query($koneksi, "SELECT
        siswa.nama AS namasiswa,
        guru.nama AS namaguru,
        mapel.mapel,
        nilai.nilai
        FROM nilai
        JOIN siswa ON nilai.nis = siswa.nis
        JOIN guru ON nilai.nip = guru.nip
        JOIN mapel ON nilai.id_mapel = mapel.id_mapel
        WHERE nilai.nis = '$nis'
        ORDER BY mapel.mapel ASC
    ");

    $siswa_data = mysqli_fetch_assoc($query);

    ?>

    <h2>DATA NILAI SISWA</h2>

    <div class="nama">
        Nama Siswa:
        <strong><?php echo $siswa_data['namasiswa']; ?></strong>
    </div>

    <table>

        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th>Nilai</th>
        </tr>

        <?php

        mysqli_data_seek($query, 0);

        $no = 1;

        while ($data = mysqli_fetch_array($query)) {

        ?>

        <tr>

            <td class="center">
                <?php echo $no++; ?>
            </td>

            <td>
                <?php echo $data['mapel']; ?>
            </td>

            <td>
                <?php echo $data['namaguru']; ?>
            </td>

            <td class="center">
                <?php echo $data['nilai']; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

<?php

} else {

    // PRINT SEMUA SISWA

    ?>

    <h2>DATA NILAI SISWA</h2>

    <div class="nama">
        Semua Data Nilai
    </div>

    <table>

        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th>Nilai</th>
        </tr>

        <?php

        $query = mysqli_query($koneksi, "SELECT
            siswa.nama AS namasiswa,
            guru.nama AS namaguru,
            mapel.mapel,
            nilai.nilai
            FROM nilai
            JOIN siswa ON nilai.nis = siswa.nis
            JOIN guru ON nilai.nip = guru.nip
            JOIN mapel ON nilai.id_mapel = mapel.id_mapel
            ORDER BY siswa.nama ASC, mapel.mapel ASC
        ");

        $no = 1;

        while ($data = mysqli_fetch_array($query)) {

        ?>

        <tr>

            <td class="center">
                <?php echo $no++; ?>
            </td>

            <td>
                <?php echo $data['namasiswa']; ?>
            </td>

            <td>
                <?php echo $data['mapel']; ?>
            </td>

            <td>
                <?php echo $data['namaguru']; ?>
            </td>

            <td class="center">
                <?php echo $data['nilai']; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

<?php } ?>

<br>

<button class="no-print" onclick="window.print()">
    🖨 Print
</button>

</body>

</html>