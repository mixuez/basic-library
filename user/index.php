<?php 
include_once("../class/Pemberitahuan.php");
include_once("../class/Buku.php");

$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->all();

$buku = new Buku;
$data_buku = $buku->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <title>User Dashboard</title>
    <?php include("../partials/t_script_js.php") ?>
</head>
<body>    
    <div class="container">
    <?php include("../partials/sidebar.php"); ?>

    <div class="pemberitahuan">
        <?php 
            foreach($data_pemberitahuan as $pemberitahuan){
                ?>
                    <div class="alert alert-info">
                        <span><?= $pemberitahuan["isi"]?></span>
                    </div>
                <?php
            }
        ?>
        
    </div>

    <div class="table">
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            foreach($data_buku as $key => $buku){
            ?>
                <tr>
                    <td><?= $key +1 ?></td>
                    <td><?= $buku["judul_buku"]?></td>
                    <td><?= $buku["pengarang"] ?></td>
                    <td><?= $buku["nama_penerbit"] ?></td>
                    <td><a href="form_peminjaman.php?id_buku=<?= $buku["id"] ?>">Pinjam</a></td>
                </tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>

    <?php include("../partials/b_script_js.php") ?>
</body>
</html>