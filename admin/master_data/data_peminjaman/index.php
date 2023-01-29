<?php 
include_once("../../../class/User.php");
include_once("../../../class/Peminjaman.php");

$user = new User;
$data_user = $user->find(1);

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style_a.css">
    <?php include("../../../partials/t_script_js.php") ?>
    <title>Data Anggota</title>
</head>
<body
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="table">
        <h3>Data Anggota</h3>
        
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku Saat Dipinjam</th>
                    <th>Kondisi Buku Saat Dikembalikan</th>
                    <th>Denda</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            foreach($data_peminjaman as $key => $a){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $a["peminjam"] ?></td>
                    <td><?= $a["buku"] ?></td>
                    <td><?= $a["tanggal_peminjaman"] ?></td>
                    <td><?= $a["tanggal_pengembalian"] ?></td>
                    <td><?= $a["kondisi_buku_saat_dipinjam"] ?></td>
                    <td><?= $a["kondisi_buku_saat_dikembalikan"] ?></td>
                    <td><?= $a["denda"] ?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <?php include("../../../partials/b_script_js.php") ?>
</body>
</html>