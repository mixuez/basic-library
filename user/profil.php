<?php 
include_once("../class/User.php");

$user = new User;
$data_user = $user->find(2);

if(isset($_POST["submit"])){
    $data = [
        "id" => $_POST["id"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
    ];

    $simpan = $user->update($_POST["id"], $data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php include("../partials/sidebar.php") ?>
    
    <div class="profil">
        <form method="post" action="" enctype="multipart/form-data">
            <table>
                <input type="hidden" name="id" value="<?= $data_user["id"] ?>">
                <tr>
                    <th>Foto</th>
                    <td>
                        <input type="file" name="foto">
                    </td>
                </tr>

                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                        <input type="text" name="fullname" value="<?= $data_user["fullname"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Kode Anggotta</th>
                    <td>
                        <input type="text" name="kode" disabled value="<?= $data_user["kode"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>NIS</th>
                    <td>
                        <input type="text" name="nis" value="<?= $data_user["nis"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Username</th>
                    <td>
                        <input type="text" name="username" value="<?= $data_user["username"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Password</th>
                    <td>
                        <input type="password" name="password" value="" placeholder="Password belum diubah">
                    </td>
                </tr>

                <tr>
                    <th>Kelas</th>
                    <td>
                        <input type="text" name="kelas" value="<?= $data_user["kelas"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>
                        <textarea name="alamat"><?= $data_user["alamat"] ?></textarea>
                    </td>
                </tr>

                <button type="submit" name="submit">Simpan</button>
            </table>
        </form>
    </div>
</body>
</html>