<?php

require 'functions.php';

$id = $_GET["idpengajuan"];

if(terimapengajuan($id)> 0){
    echo "
            <script>
                alert('Pengajuan disetujui!');
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