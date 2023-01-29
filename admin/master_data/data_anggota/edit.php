<?php 
include_once("../../../class/User.php");

$id = $_GET["id"]; 

$user = new User;
$data_user = $user->find($id);

if(isset($_POST["submit"])){
    $data = [
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" =>  password_hash($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "role" => $_POST["role"],
        "foto" => $_POST["foto"],
    ];
    
    $user->update($id ,$data);

    header("Location: index.php?pesan=edit_suskes");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota</title>
</head>
<body>
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="form">
        <form action="" method="post">
            <div>
                <label>Kode</label>
                <input type="text" name="kode" value="<?= $data_user["kode"] ?>">
            </div>

            <div>
                <label>NIS</label>
                <input type="text" name="nis" value="<?= $data_user["nis"] ?>">
            </div>

            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="fullname" value="<?= $data_user["fullname"] ?>">
            </div>

            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?= $data_user["username"] ?>">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" value="" placeholder="Password Belum Diganti">
            </div>

            <div>
                <label>Kelas</label>
                <input type="text" name="kelas" value="<?= $data_user["kelas"] ?>">
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="alamat" cols="30" rows="10"><?= $data_user["alamat"] ?></textarea>
            </div>

            <div>
                <label>Foto</label>
                <input type="file" name="foto" value="<?= $data_user["foto"] ?>">
            </div>
             
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>