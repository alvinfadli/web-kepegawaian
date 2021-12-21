<?php

require 'functions.php';

$id = $_GET["idpengajuan"];

if(tolakpengajuan($id)> 0){
    echo "
            <script>
                alert('Pengajuan ditolak!');
                document.location.href = 'laporan_pengajuan.php';
            </script>
        ";
}else{
    echo "
            <script>
                alert('Proses gagal!');
                document.location.href = 'laporan_pengajuan.php';
            </script>
        ";
}

?>