<?php 
include_once("Database.php");

class User extends Database{

    public function all(){
        $sql = "SELECT * FROM user";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAnggota(){
        $sql = "SELECT * FROM user WHERE role='user'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdministrator(){
        $sql = "SELECT * FROM user WHERE role='admin'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }


    public function find($id){
        $sql = "SELECT * FROM user WHERE id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nis = $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        // $verif = $data["verif"];
        $role = "user";
        $join_date = date("Y-m-d");
        $foto = $data["foto"];

        $sql = "INSERT INTO user(kode, nis, fullname, username, password, kelas, alamat, role, join_date, foto) VALUES('$kode', '$nis', '$fullname', '$username', '$password', '$kelas', '$alamat', '$role' ,'$join_date', '$foto')";
        
        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    public function createAdmin($data){
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        // $verif = $data["verif"];
        $role = "admin";
        $join_date = date("Y-m-d");
        $foto = $data["foto"];

        $sql = "INSERT INTO user(fullname, username, password, role, join_date, foto) VALUES('$fullname', '$username', '$password', '$role' ,'$join_date', '$foto')";
        
        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nis = $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        $foto = $data["foto"];

        $sql = "UPDATE user SET kode='$kode', nis ='$nis', fullname ='$fullname', username ='$username', password ='$password', kelas ='$kelas', alamat ='$alamat', foto='$foto' WHERE id = '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM user WHERE id='$id'";

        if($this->db->query($sql) == TRUE ){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

}

?>
