<?php

session_start();

unset($_SESSION['usuario_admin']);
unset($_SESSION['nome']);
unset($_SESSION['sobrenome']);
unset($_SESSION['email']);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>