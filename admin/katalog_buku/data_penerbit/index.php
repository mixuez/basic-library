<?php 
include_once("../../../class/User.php");
include_once("../../../class/Penerbit.php");

$user = new User;
$data_user = $user->find(1);

$penerbit = new Penerbit;
$data_penerbit = $penerbit->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style_a.css">
    <?php include("../../../partials/t_script_js.php") ?>
    <title>Data Buku</title>
</head>
<body>
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="table">
        <h3>Data Admin</h3>

        <a href="tambah.php">Tambah</a>

        <table id="jquery-tab">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Penerbit</th>
                <th>Nama Penerbit</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            
            <tbody>
                <?php foreach($data_penerbit as $key => $a) {
                ?>
    
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $a["kode"] ?></td>
                    <td><?= $a["nama"] ?></td>
                    <td><?= $a["verif"] ?></td>
                    <td>
                        <a href="edit.php">Edit</a> |
                        <a href="hapus.php">Hapus</a>
                    </td>
                </tr>
    
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include("../../../partials/b_script_js.php") ?>
</body>
</html>