<?php
    $conn = mysqli_connect("localhost","root","","dbkepegawaian");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function edit($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $tempatlahir = htmlspecialchars($data["tempatlahir"]);
        $tanggallahir = htmlspecialchars($data["tanggallahir"]);
        $pendidikan = htmlspecialchars($data["pendidikan"]);
        $namainstitusi = htmlspecialchars($data["namainstitusi"]);

        $query = "UPDATE pegawai SET
        nama = '$nama',
        alamat = '$alamat',
        tempatlahir = '$tempatlahir',
        tanggallahir = '$tanggallahir',
        pendidikan = '$pendidikan',
        namainstitusi = '$namainstitusi'
        WHERE id='$id'
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM pengajuan WHERE idpengajuan=$id");
        return mysqli_affected_rows($conn);
    }
    function terimapengajuan($id){
        global $conn;
        $pegawai = mysqli_query($conn, "SELECT *FROM pegawai join pengajuan WHERE pegawai.id = pengajuan.idpegawai and idpengajuan=$id");
        $jenisPengajuan = mysqli_query($conn, "SELECT *FROM pengajuan WHERE idpengajuan=$id");
        
        foreach($jenisPengajuan as $data){
            $jenis = $data['jenis'];
        }
        foreach($pegawai as $row){
            $pangkat = $row['pangkat'];
            $gaji = $row['gaji'];
        }
        if($jenis != 'Cuti'){
            $datapangkat = array('I.A','I.B','I.C','I.D','II.A','II.B','II.C','II.D','III.A','III.B','III.C','III.D');
            $dataPangkatLength = count($datapangkat);
            for($i = 0; $i<$dataPangkatLength; $i++){
                if($pangkat == $datapangkat[$i]){
                    if($pangkat == $datapangkat[$dataPangkatLength-1]){
                        break;
                    }
                    $pangkat = $datapangkat[$i+1];
                    break;
                }
            }
            $gaji = $gaji + 1000000;
        }
        //mysqli_query($conn, "UPDATE pengajuan SET status='Disetujui', gaji WHERE idpengajuan=$id");
        mysqli_query($conn, "UPDATE pengajuan,pegawai SET pengajuan.status='Disetujui', pegawai.gaji=$gaji, pegawai.pangkat='$pangkat' WHERE pegawai.id = pengajuan.idpegawai and idpengajuan=$id");
        return mysqli_affected_rows($conn);
    }
    function tolakpengajuan($id){
        global $conn;
        mysqli_query($conn, "UPDATE pengajuan SET status='Ditolak' WHERE idpengajuan=$id");
        return mysqli_affected_rows($conn);
    }
    function cari($keyword){
        $query = "SELECT nama, id, nama_unit, pendidikan, alamat FROM
        unit join pegawai using(id_unit) WHERE id_unit='$keyword'";
        return query($query);
    }
    function register($data){
        global $conn;
        $id = stripslashes($data['id']);
        $password = mysqli_real_escape_string($conn, $data['password']);
        $nama = $data['nama'];
        $id_unit = $data['unit'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "SELECT id from pegawai where id = '$id'");
        if(mysqli_fetch_assoc($result)){
            echo"<script>Username sudah digunakan!</script>";
            return false;
        }
        mysqli_query($conn, "INSERT INTO pegawai (id, password, nama, id_unit) values('$id', '$password','$nama', '$id_unit')");
        return mysqli_affected_rows($conn);
    }
?>