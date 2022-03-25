<?php 
session_start();
unset($_SESSION["level"]);
unset($_SESSION["email"]);
unset($_SESSION["id"]);

session_destroy($_SESSION["level"]);
session_destroy($_SESSION["email"]);
session_destroy($_SESSION["id"]);

header("Location: index.php");

 ?>