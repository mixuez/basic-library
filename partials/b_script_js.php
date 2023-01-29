<script>
    $(document).ready( function () {
        $('#jquery-tab').DataTable();
    } );
</script>

<script>
    function hapus(id){
        let konfirmasi = confirm("Apakah Anda yakin ingin menghapus user ini?");

        if(konfirmasi == true){
            window.location.href = "hapus.php?id=" + id;
        }
    }   
</script>

<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

