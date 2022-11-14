<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['nome']);
unset($_SESSION['sobrenome']);
unset($_SESSION['email']);

header('Location: /Admin_Si912/index.php');

?>