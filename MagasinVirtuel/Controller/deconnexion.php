<?php

session_start();
session_destroy();

echo("Deconnexion...");
header('Refresh : 1;url=../View/index.php');
exit();

?>