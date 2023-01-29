<?php 
include_once("../../../class/User.php");
include_once("../../../class/Kategori.php");

$user = new User;
$data_user = $user->find(1);

$kategori = new Kategori;
$data_kategori = $kategori->all()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style_a.css">
    <?php include("../../../partials/t_script_js.php") ?>
    <title>Data Kategori</title>
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
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            </thead>
            
            <tbody>
                <?php foreach($data_kategori as $key => $a) {
                ?>
    
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $a["nama"] ?></td>
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