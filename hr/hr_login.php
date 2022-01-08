<?php
session_start();

if(isset($_SESSION["login"])){
  header("Location: dashboard_hr.php");
  exit;
}

require '../functions.php';

if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT *FROM hr WHERE idhr='$username'");
  $namaHR = current($conn->query("SELECT nama FROM hr WHERE idhr='$username'")->fetch_assoc());
  $_SESSION['namaHR'] = $namaHR;
  if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($password == $row["password"]){
      $_SESSION["loginhr"] = true;
      header("Location: dashboard_hr.php");
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
    <link rel="stylesheet" href="../style/login.css" />
    <title>Website Kepegawaian</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row no-gutter">
        <div class="col-xl-4 bg-white">
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
                    <img src="../images/hrLogin.jpg" width="100%" alt="" />
                  </div>
                  <form action="" method="POST">
                    <div class="form-goup mb-3 divCenter">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="25"
                        height="25"
                        fill="currentColor"
                        class="bi bi-people-fill"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"
                        />
                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
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
                        name="password"
                        type="password"
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
                        style="margin-bottom: 25px"
                      />
                    </div>
                    <div class="form-group mb-3">
                      <button
                        type="submit"
                        name="login"
                        class="
                          btn btn-dark btn-block
                          text-uppercase
                          rounded-pill
                          shadow-sm
                          divCenter
                        "
                        style="width: 50%"
                      >
                        Login
                      </button>
                    </div>
                    <div class="form-group mb-5" id="linkEl">
                      <a href="../index.php">Login sebagai Pegawai</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 d-none d-xl-flex bg-image-hr"></div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
