<?php
session_start();
    include('config.php');

    $user = mysqli_real_escape_string ($con, $_POST['user']);
    $passwd = mysqli_real_escape_string ($con, $_POST['passwd']);
    $query = "select usuario_id, usuario from usuario where usuario = '{$user}' and senha = md5('{$passwd}')";
    $result = mysqli_query($con, $query);
    $row = mysqli_num_rows($result);

    if($row == 1) {
        $_SESSION['user'] = $user;
        header('Location: crud.php');
        exit();
    } else {
        $_SESSION['invalido'] = true;
        header('Location: index.php');
        exit();
    }
    