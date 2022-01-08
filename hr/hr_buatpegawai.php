<?php
    session_start();

    require '../functions.php';

  if(!isset($_SESSION["loginhr"])){
    header("Location: hr_login.php");
    exit;
  }
  $units = mysqli_query($conn, "SELECT id_unit, nama_unit FROM unit;");

  if(isset($_POST['submit'])){
    if(register($_POST) > 0){
      echo "<script>alert('Pendaftaran pegawai berhasil');</script>";
    } else{
      echo mysqli_error($conn);
    }
  }

  

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/nav.css">
    <title>Buat Pegawai</title>
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
              width="14"
              height="14"
              fill="currentColor"
              class="bi bi-caret-down-fill"
              viewBox="0 0 18 18"
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
    <h2 style="text-align: center; margin-top: 1.5rem">Buat akun pegawai</h2>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group mb-3 divCenter">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-briefcase-fill"
                viewBox="0 0 16 16"
                >
                <path
                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"
                />
                <path
                    d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"
                />
                </svg>
            </div>
            <div class="form-group mb-2">
                <label
                for="nama"
                style="padding-left: 10px; padding-bottom: 5px"
                >Nama Pegawai</label
                >
                <input
                id="nama"
                name="nama"
                type="text"
                placeholder="Nama Pegawai"
                required=""
                autofocus=""
                class="
                    form-control
                    rounded-pill
                    border-1
                    shadow-sm
                    px-4
                "
                />
            </div>
            <div class="form-group mb-2">
                <label
                for="username"
                style="padding-left: 10px; padding-bottom: 5px"
                >Username</label
                >
                <input
                id="id"
                name="id"
                type="text"
                placeholder="Username"
                required=""
                autofocus=""
                class="
                    form-control
                    rounded-pill
                    border-1
                    shadow-sm
                    px-4
                "
                />
            </div>
            <div class="form-group mb-2">
                <label
                for="password"
                style="padding-left: 10px; padding-bottom: 5px"
                >Password</label
                >
                <input
                id="password"
                type="password"
                name="password"
                placeholder="Password"
                required=""
                class="
                    form-control
                    rounded-pill
                    border-1
                    shadow-sm
                    px-4
                    text-primary
                "
                
                />
            <div class="form-group mb-2">
            <label
                for="unit"
                style="padding-left: 10px; padding-bottom: 5px; padding-top:10px;"
                >Unit</label
                >
                <select class="form-select rounded-pill
                    border-1
                    shadow-sm
                    px-4" aria-label="Default select example" style="margin-bottom: 25px" name="unit">
                    <option selected>Pilih unit</option>
                    <?php while($options = mysqli_fetch_assoc($units)):?>
                        <option><?= $options['id_unit'];?></option>
                    <?php endwhile;?>
                </select>

            </div>
            
            <div class="form-group mb-3">
                <button
                type="submit"
                class="
                    btn btn-dark btn-block
                    text-uppercase
                    rounded-pill
                    shadow-sm
                    divCenter
                "
                name="submit"
                id="submit"
                style="width: 50%"
                >
                Daftar
                </button>
            </div>
        </form>
    </div>
    <style>
        .container{
            width: 40%;
        }
        .divCenter {
            display: block;
            margin: auto;
            text-align: center;
        }
        .dropdown-menu-right {
        right: 0;
        left: auto;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
  </body>
</html>
