<?php 
include_once("Database.php");

class Identitas extends Database{
    public function all(){
        $sql = "SELECT * FROM indentitas";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM indentitas  WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data){
        $nama = $data["nama"];
        $alamat = $data["alamat"];
        $email = $data["email"];
        $nomor_hp = $data["nomor_hp"];
        $foto = $data["foto"];

        $sql = "INSERT INTO indentitas(nama, alamat, email, nonmr_hp, foto) VALUES('$nama', '$alamat', '$email', '$nomor_hp', '$foto')";

        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    public function update($id, $data){
        $nama = $data["nama"];
        $alamat = $data["alamat"];
        $email = $data["email"];
        $nomor_hp = $data["nomor_hp"];
        $foto = $data["foto"];

        $sql = "UPDATE indentitas SET nama='$nama', alamat='$alamat', email='$email', nomor_hp='$nomor_hp', foto='$foto' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM indentitas WHERE id = '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil mengahapus data";
        } else{
            return "Gagal menghapus data";
        }
    }
}
 ?>