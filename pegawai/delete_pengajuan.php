<?php

require 'functions.php';

$id = $_GET["idpengajuan"];
if(hapus($id)> 0){
    echo "
            <script>
                alert('Pengajuan berhasil dibatalkan!');
                document.location.href = 'pegawai_pengajuan.php';
            </script>
        ";
}else{
    echo "
            <script>
                alert('Pengajuan gagal dibatalkan!');
                document.location.href = 'pegawai_pengajuan.php';
            </script>
        ";
}
?>