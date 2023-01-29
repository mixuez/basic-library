<?php 
include_once("../../../class/User.php");

$user = new User;
$data_user = $user->find(1);

$anggota = new User;
$data_anggota = $anggota->getAnggota();
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
        
        <?php 
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == 'hapus_sukses'){
                echo "Berhasil menghapus";
            } 
            // if($_GET["pesan"] !== 'hapus_sukses'){
            //     echo "Gagal menghapus";
            // }
            if($_GET["pesan"] == 'tambah_sukses'){
                echo "Berhasil menambah";
            }
            if($_GET["pesan"] == 'edit_sukses'){
                echo "Berhasil mengedit";
            }
        }
        ?>

        <a href="tambah.php">Tambah</a>
        
        <table id="jquery-tab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>NIS</th>
                    <th>Nama lengkap</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            foreach($data_anggota as $key => $a){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $a["kode"] ?></td>
                    <td><?= $a["nis"] ?></td>
                    <td><?= $a["fullname"] ?></td>
                    <td><?= $a["kelas"] ?></td>
                    <td><?= $a["alamat"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $a["id"]?>">Edit</a> |
                        <a onclick="hapus(<?= $a['id']?>)" href="#">Hapus</a>
                    </td>
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