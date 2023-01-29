<?php 
include_once("../class/Pesan.php");

$id_pesan = $_GET["id"];

$pesan = new Pesan;
$data_pesan = $pesan->find($id_pesan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <title>Baca Pesan</title>
</head>
<body>
    <?php include("../partials/sidebar.php") ?>

    <div class="table">
        <h3>Pesan</h3>
        <a href="pesan.php">Kembali</a>

        <table>
            <tr>
                <th>Judul Pesan</th>
                <td><?= $data_pesan["judul_pesan"]; ?></td>
            </tr>

            <tr>
                <th>Isi Pesan</th>
                <td><?= $data_pesan["isi_pesan"]; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>