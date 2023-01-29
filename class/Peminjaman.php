<?php 
include_once("Database.php");

class Peminjaman extends Database{ 

    public function all(){
        $sql = "SELECT user.fullname as peminjam, buku.judul_buku as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM  peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC) ;
    }

    public function getPeminjaman(){
        $sql = "SELECT user.fullname as peminjam, buku.judul_buku as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM  peminjaman, buku, user WHERE  peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC) ;
    }

    public function getPengembalian(){
        $sql = "SELECT user.fullname as peminjam, buku.judul_buku as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT buku.judul_buku as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findKembali($id){
        $sql = "SELECT buku.judul_buku as buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];        
        $tanggal_peminjaman = $data["tanggal_peminjaman"];        
        $kondisi_buku_saat_dipinjam = $data["kondisi_buku_saat_dipinjam"];        

        $sql = "INSERT INTO peminjaman(id_user, id_buku, tanggal_peminjaman, kondisi_buku_saat_dipinjam) VALUES('$id_user', '$id_buku', '$tanggal_peminjaman', '$kondisi_buku_saat_dipinjam')";

        if($this->db->query($sql) === TRUE){
            return "Berhasil menambah data";
        } else{
            return "Gagal menambah data";
        }
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data["nama"];
        
        $sql = "UPDATE peminjaman SET kode='$kode', nama='$nama' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil memperbaharui data";
        } else{
            return "Gagal memperbaharui data";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM peminjaman WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            return "Berhasil mengahapus data";
        } else{
            return "Gagal menghapus data";
        }
    }
}

?>