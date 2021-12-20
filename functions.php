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
?>