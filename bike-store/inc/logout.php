<?php
@session_start();

session_destroy();

header("location: /bike-store/login.php")
?>