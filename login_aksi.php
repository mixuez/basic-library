<?php
    //mulai session
    session_start();

    //koneksi ke database
    include "koneksi.php";

    //ambil data dari form login
    $username=$_POST['nama'];
    $password=$_POST['katakunci'];

    //query dari tabel petugas
    $ambildata=mysqli_query($sambung,"select * from tbl_petugas where username='$username' and password='$password'");
    
    //cek data
    $cek=mysqli_num_rows($ambildata);
    if($cek>0)
    {
        $_SESSION['username']=$username;
        $_SESSION['status']='login';
        header("location:admin/index.php");
    }
    else
    {
        header("location:index.php?pesan=gagal");
    }
?>
