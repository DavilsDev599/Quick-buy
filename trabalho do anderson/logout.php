<?php
session_start();

/* REMOVE TODAS AS SESSÕES */
session_unset();

/* DESTRÓI A SESSÃO */
session_destroy();

/* REDIRECIONA PARA LOGIN */
header("Location: login.php");
exit();
?>