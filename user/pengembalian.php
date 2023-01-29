<?php 
include_once("../class/Peminjaman.php");

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->findKembali(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <?php include("../partials/t_script_js.php") ?>
    <title>Pengembalian Buku</title>
</head>
<body>
    <?php include("../partials/sidebar.php") ?>

    <div class="table">
        <h3>Buku yang sudah dikembalikan</h3>

        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku Saat Dikembalikan</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            foreach($data_peminjaman as $key => $p){
            ?>

            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $p["buku"] ?></td>
                <td><?= $p["tanggal_pengembalian"] ?></td>
                <td><?= $p["kondisi_buku_saat_dikembalikan"] ?></td>
            </tr>

            <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <?php include("../partials/b_script_js.php") ?>
</body>
</html>