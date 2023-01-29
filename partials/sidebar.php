<?php 
include_once("../class/User.php");

$user = new User;
$data_user = $user->find(2);
?>

<div class="sidebar">  
    <h1>Selamat Datang di Perpustakaan Online <i><?= $data_user["fullname"] ?></i></h1> 

    <ul>
        <li> <a href="index.php">Dashboard</a></li>
        <li> <a href="peminjaman.php">Peminjaman Buku</a></li>
        <li> <a href="pengembalian.php">Pengembalian Buku</a></li>
        <li> <a href="pesan.php">Pesan</a></li>
        <li> <a href="profil.php">Profil Saya</a></li>
        <li> <a href="../logout.php">Keluar</a></li>
    </ul>

</div>