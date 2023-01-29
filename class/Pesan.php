<?php 
include_once("Database.php");

class Pesan extends Database{
    public function all(){
        $sql = "SELECT * FROM pesan";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM pesan  WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function findByUserId($id){
        $sql = "SELECT * FROM pesan  WHERE id_penerima = '$id'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "INSERT INTO pesan(kode, nama) VALUES('$kode', '$nama')";

        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE pesan SET kode='$kode', nama='$nama' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM pesan WHERE id = '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil mengahapus data";
        } else{
            return "Gagal menghapus data";
        }
    }
}
 ?>