<?php 
include_once("../../../class/User.php");

$id = $_GET["id"];

$user = new User;
$data_user = $user->find($id);

if(isset($_POST["submit"])){
    $data = [
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "foto" => $_POST["foto"],
    ];

    $user->update($id, $data);

    header("Location: index.php?pesan=edit_sukses");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
</head>
<body>
    <?php include("../../../partials/sidebar_admin.php") ?>

    <div class="form">
        <form action="" method="post">
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
                <input type="text" name="password" value="" placeholder="Password belum diubah">    
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