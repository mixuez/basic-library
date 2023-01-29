<?php 
include_once("../../../class/User.php");

// $data_user = $user->find(1);

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

    $user = new User;
    $submit = $user->create($data);

    header("Location: index.php?pesan=tambah_suskes");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Anggota</title>
</head>
<body>
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="form">
        <form action="" method="post">
            <div>
                <label>Kode</label>
                <input type="text" name="kode">
            </div>

            <div>
                <label>NIS</label>
                <input type="text" name="nis">
            </div>

            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="fullname">
            </div>

            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div>
                <label>Kelas</label>
                <input type="text" name="kelas">
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="alamat" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label>Foto</label>
                <input type="file" name="foto">
            </div>
             
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>