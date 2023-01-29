<?php 
include_once("Database.php");
include_once("Penerbit.php");

class Buku extends Database{

    public function all(){
        $sql = "SELECT buku.id, buku.judul_buku, buku.pengarang, penerbit.nama as nama_penerbit, buku.j_buku_baik, buku.j_buku_rusak, buku.j_buku_baik + buku.j_buku_rusak as jumlah FROM buku, penerbit WHERE buku.id_penerbit = penerbit.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM buku WHERE id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "INSERT INTO  buku(kode, nama) VALUES('$kode', '$nama')";

        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE buku SET kode='$kode', nama='$nama' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM buku WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil mengahapus data";
        } else{
            return "Gagal menghapus data";
        }
    }
}
?>