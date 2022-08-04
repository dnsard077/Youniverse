<?php

    session_start();
    session_unset();
    session_destroy();
    setcookie('login','', time()-36000);

    header("Location: index.php");
    exit;

?>