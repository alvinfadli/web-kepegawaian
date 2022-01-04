<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
<<<<<<< HEAD
=======

>>>>>>> d1a8d0d947e233657ff3d960900284465fe3ff72
    header("Location: ../index.php");
    exit;
?>