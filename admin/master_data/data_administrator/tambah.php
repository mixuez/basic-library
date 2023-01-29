<?php 
include_once("../../../class/User.php");

if(isset($_POST["submit"])){
    $data = [
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "terakhir_login" => $_POST["terakhir_login"],
        "foto" => $_POST["foto"],
    ];

    $user = new User;
    $user->createAdmin($data);

    header("Location: index.php?pesan=tambah_sukses");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
</head> 
<body>
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="form">
        <form action="" method="post">
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
                <input type="text" name="password">
            </div>

            <div>
                <label>Terakhir Login</label>
                <input type="date" name="terakhir_login" value="<?= date("Y-m-d") ?>">
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