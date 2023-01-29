<?php 
include_once("Database.php");

class Pemberitahuan extends Database{

    public function all(){
        $sql = "SELECT * FROM pemberitahuan WHERE status = 'aktif'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC) ;
    }

    public function find($id){
        $sql = "SELECT * FROM pemberitahuan  WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    // 
    // FUNCTION CREATE DATA
    //  
    public function create($data){
        $isi = $data["isi"];
        $status = $data["status"];
        $sql = "INSERT INTO pemberitahuan(isi, status) VALUES('$isi', '$status')";

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
        $isi = $data["isi"];
        $status = $data["status"];
        $sql = "UPDATE pemberitahuan SET isi = '$isi', status = '$status' WHERE id = '$id'";

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
        $sql = "DELETE FROM pemberitahuan WHERE id = '$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil mengahapus data";
        } else{
            return "Gagal menghapus data";
        }
    }
}


?>