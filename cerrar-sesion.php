<?php
    session_start();
    session_destroy();
    header("Location:loggin-estudiantes.html");
?>