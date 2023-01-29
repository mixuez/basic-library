<?php 
include_once("Database.php");

class Kategori extends Database{

    public function all(){
        $sql = "SELECT * FROM kategori";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC) ;
    }

    public function find($id){
        $sql = "SELECT * FROM kategori  WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    // 
    // FUNCTION CREATE DATA
    //  
    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];
        $sql = "INSERT INTO kategori(kode, nama) VALUES('$kode', '$nama')";

        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    // 
    // FUNCTION UPDATE DATA
    //  
    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data["nama"];
        $sql = "UPDATE kategori SET kode = '$kode', nama = '$nama' WHERE id = '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

    // 
    //FUNCTION DELETE DATA
    //  
    public function delete($id){
        $sql = "DELETE FROM kategori WHERE id = '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil mengahapus data";
        } else{
            return "Gagal menghapus data";
        }
    }
}


?>