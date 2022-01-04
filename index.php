<?php
session_start();

if(isset($_SESSION["login"])){
  header("Location: pegawai/dashboard_pegawai.php");
  exit;
}
require 'functions.php';

if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT *FROM pegawai WHERE id='$username'");
  $_SESSION['username'] = $username;
  if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($password == $row["password"]){
      $_SESSION["login"] = true;
      header("Location: pegawai/dashboard_pegawai.php");
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style/login.css" />
    <title>Website Kepegawaian</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row no-gutter">
        <div class="col-xl-4 bg-white loginForm">
          <div class="login d-flex align-items-center py-5">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-xl-10 mx-auto">
                  <h3
                    class="display-4 main-title"
                    style="margin-bottom: 2rem; font-weight: 500"
                  >
                    Website Kepegawaian
                  </h3>
                  <div class="smallImage">
                    <img src="./images/loginScreen.jpg" width="100%" alt="" />
                  </div>
                  <?php if(isset($error)): ?>
                    <p style="color: red;">Username atau Password yang anda masukkan salah!</p>
                  <?php endif;?>
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
                        for="username"
                        style="padding-left: 10px; padding-bottom: 5px"
                        >Username</label
                      >
                      <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Username"
                        required=""
                        autofocus=""
                        class="
                          form-control
                          rounded-pill
                          border-0
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
                          border-0
                          shadow-sm
                          px-4
                          text-primary
                        "
                        style="margin-bottom: 25px"
                      />
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
                        name="login"
                        style="width: 50%"
                      >
                        Login
                      </button>
                    </div>
                    <div class="form-group mb-5" id="linkEl">
                      <a href="./hr/hr_login.php">Login sebagai HR</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-image col-8 d-none d-xl-flex"></div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
