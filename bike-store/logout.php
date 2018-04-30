<?php
@session_start();

session_destroy();

header("location: /kapal/login.php")
?>