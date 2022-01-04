<?php
  session_start();
  require '../functions.php';

  if(!isset($_SESSION["loginhr"])){
    header("Location: hr_login.php");
    exit;
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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../style/nav.css">

    <title>Human Resource</title>
  </head>
  <body>
    <!-- navbar -->
    <section>
      <nav class="navbar navbar-white bg-white justify-content-between">
      <a href="dashboard_hr.php" class="navbar-brand">Human Resource</a>

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
          <a class="dropdown-item" href="dashboard_hr.php">Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="hr_logout.php">Logout</a>
          </div>
        </div>
      </nav>
    </section>
    <!-- navbar end -->
    <!-- banner -->
    <div class="d-md-flex h-md-100 align-items-center" style="display: block">
      <!-- First Half -->
      <div class="col-md-5 p-0 h-md-100">
        <div
          class="
            d-md-flex
            align-items-center
            h-100
            p-5
            text-left
            justify-content-center
          "
        >
          <div class="logoarea pt-5 pb-5">
            <p id="mainTitle" style="padding-left: 2rem">
              Selamat Pagi, <?php echo $_SESSION["namaHR"];?>
            </p>
          </div>
        </div>
      </div>

      <!-- Second Half -->
      <div class="col-md-7 p-0 bg-white h-md-100 loginarea">
        <div
          class="
            d-md-flex
            align-items-center
            h-md-100
            p-5
            justify-content-center
          "
        >
          <img src="../images/hrMain.jpg" alt="" style="width: 100%" />
        </div>
      </div>
    </div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 136.56 1440 183.44"
      style="margin-bottom: -10px"
    >
      <path
        fill="#d4ecfc"
        fill-opacity="1"
        d="M0,256L80,256C160,256,320,256,480,229.3C640,203,800,149,960,138.7C1120,128,1280,160,1360,176L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
      ></path>
    </svg>
    <!-- banner end -->
    <!-- menu -->
    <section id="mainMenu">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <h2 style="font-weight: bold">Home</h2>
          </div>
        </div>
        <br />
        <div class="card-deck row justify-content-center" data-aos="fade-up" data-aos-duration="1200">
          <div class="col-xs-12 col-sm-6 col-md-4">
            <!-- Card -->
            <div class="card">
              <!--Card image-->
              <div class="view overlay">
                <img
                  class="card-img-top"
                  src="../images/pegawaiPerUnit.jpg"
                  alt="Card image cap"
                  style="border: 0.5px solid white; border-radius: 50px"
                />
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!--Card content-->
              <a href="hr_pegawaiperunit.php" class="cardLinks">
                <div class="card-body text-center">
                  <h4 class="card-title">Data Pegawai</h4>
                  <p class="card-text">
                    Lihat data pegawai berdasarkan unit dihalaman ini
                  </p>
                </div>
              </a>
            </div>
            <!-- Card -->
          </div>

          <div class="col-xs-12 col-sm-6 col-md-4">
            <!-- Card -->
            <div class="card mb-4">
              <!--Card image-->
              <div class="view overlay">
                <img
                  class="card-img-top"
                  src="../images/hrPengajuan.jpg"
                  alt="Card image cap"
                  style="border: 0.5px solid white; border-radius: 50px"
                />
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!--Card content-->
              <a href="laporan_pengajuan.php" class="cardLinks">
                <div class="card-body text-center">
                  <h4 class="card-title">Laporan</h4>
                  <p class="card-text">
                    Laporan data pegawai yang mengajukan cuti dan kenaikan
                    pangkat
                  </p>
                </div>
              </a>
            </div>
            <!-- Card -->
          </div>
        </div>
      </div>
    </section>
    <!-- menu end -->

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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
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
      .navbar {
        padding-top: 0;
      }
      .navbar-brand {
        font-weight: bold;
        font-size: 26px;
      }
      .nav-link {
        padding-top: 20px;
        color: black;
      }
      .nav-link:hover {
        color: lightskyblue;
      }
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
      #mainMenu {
        background-color: #d4ecfc;
        padding: 0;
        padding-bottom: 3rem;
      }
      #banner {
        background-color: red;
      }
      .card {
        height: 100%;
        border: 1px solid white;
        border-radius: 50px;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
      }
      .cardLinks {
        color: black;
      }
      .footer {
        padding-bottom: 1px;
        background-color: black;
        text-align: center;
      }
      /* .mainGreeting {
        margin: auto;
        border: 3px solid green;
        font-size: 48px;
        font-weight: bold;
      } */
    </style>
  </body>
</html>
