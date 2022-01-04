<?php
  session_start();
  require '../functions.php';

  if(!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
  }

  if(isset($_POST["submit"])){
      $jenis = $_POST['jenis'];
      $status = 'Ditunda';
      $idpegawai = $_SESSION['username'];
      $idhr = 'HR001';
      $tanggalpengajuan = $_POST['tanggalpengajuan'];
      $alasan = htmlspecialchars($_POST['alasan']);

      $query = "INSERT INTO pengajuan (jenis, status, idpegawai, idhr, tanggalpengajuan,alasan)
        VALUES ('$jenis','$status','$idpegawai','$idhr','$tanggalpengajuan','$alasan')";

      mysqli_query($conn, $query);

      if(mysqli_affected_rows($conn) > 0){
        echo "
            <script>
                alert('Pengajuan berhasil ditambahkan!');
                document.location.href = 'pegawai_pengajuan.php';
            </script>
        ";
      }else{
        echo "
        <script>
            alert('Pengajuan gagal ditambahkan!');
            document.location.href = 'pegawai_pengajuan.php';
        </script>
        ";
      }

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="./style/nav.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/nav.css">
<<<<<<< HEAD
=======

>>>>>>> d1a8d0d947e233657ff3d960900284465fe3ff72

    <title>Data Pribadi Pegawai</title>
  </head>
  <body>
    <!-- navbar -->
    <section>
      <nav class="navbar navbar-white bg-white justify-content-between">
      <a href="dashboard_pegawai.php" class="navbar-brand">Employees</a>

        <div class="nav-item dropdown">
          <a
            class="nav-link"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="18"
              height="18"
              fill="currentColor"
              class="bi bi-caret-down-fill"
              viewBox="0 6 18 18"
            >
              <path
                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"
              />
            </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="dashboard_pegawai.php">Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pegawai_logout.php">Logout</a>
          </div>
        </div>
      </nav>
    </section>
    <!-- navbar end -->

    <section id="edit-pribadi">
      <div class="container">
        <h3 style="text-align: center">Buat Pengajuan</h3>
        <img src="../images/pegawaiPengajuan.png" alt="user" width="30%"/>
        <br />
        <div style="width: 70%; margin: auto">
          <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $pgw['id'];?>">
            <div class="form-group">
            <label for="jenis">Jenis</label>
            <select class="form-control" id="jenis" name="jenis">
                <option>Cuti</option>
                <option>Kenaikan Pangkat</option>
            </select>
            </div>
            <div class="form-group">
              <label for="tanggalpengajuan">Tanggal Pengajuan</label>
              <input
                type="date"
                name="tanggalpengajuan"
                class="form-control"
                id="tanggalpengajuan"
                placeholder="Masukkan tanggal pengajuan"
                required
              />
            </div>
            <div class="form-group">
                <label for="alasanpengajuan">Alasan Pengajuan</label>
                <textarea class="form-control" id="alasanpengajuan" name="alasan" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success save-btn" name="submit" id="submit">
              Simpan
            </button>
          </form>
        </div>
      </div>
    </section>

    <!-- footer -->
    <div class="footer">
      <footer>
        <p style="padding-top: 20px; color: white">
          Made by Kelompok 4 TRPL 2A PNP
        </p>
      </footer>
    </div>

    <!-- footer end -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      /* nav style */
      body {
        font-family: "Roboto", sans-serif;
      }
<<<<<<< HEAD
=======
     
>>>>>>> d1a8d0d947e233657ff3d960900284465fe3ff72
      #mainTitle {
        font-size: 55px;
        font-weight: bold;
      }
      @media (min-width: 768px) {
        .h-md-100 {
          height: 75vh;
        }
      }
      .btn-round {
        border-radius: 30px;
      }
      .text-cyan {
        color: #35bdff;
      }
      .dropdown-menu-right {
        right: 0;
        left: auto;
      }
      /* nav style end */
      .footer {
        padding-bottom: 1px;
        background-color: black;
        text-align: center;
        bottom: 0;
      }
      img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid white;
        border-radius: 30px;
      }
      table {
        display: block;
        margin-left: auto;
        margin-right: auto;
        border-collapse: separate;
        border-spacing: 10px 15px;
      }
      .container {
        /* background-color: #d4ecfc; */
        padding-top: 20px;
        border: 3px solid #d4ecfc;
        border-radius: 30px;
        margin-bottom: 2rem;
        box-shadow: 10px 10px 10px #d4ecfc;
      }
      #biodata {
        margin: 0 auto;
        border: 1px solid white;
        border-radius: 30px;
        background-color: white;
        padding: 15px;
        margin-bottom: 15px;
      }
      #buttonArea {
        width: 70%;
        margin: auto;
        margin-bottom: 20px;
      }
      .save-btn {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 20%;
        margin-bottom: 25px;
        margin-top: 20px;
      }
    </style>
  </body>
</html>
