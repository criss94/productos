<?php
    const SERVER="localhost";//mysql.hostinger.com.ar
    const USER="root";//u727428875_criss
    const CLAVE="criss";//cristian
    const DB="phpdb";//u727428875_phpdb
    $link=  mysqli_connect(SERVER,USER,CLAVE,DB) or die(mysqli_error($link));
    mysqli_set_charset($link,"utf-8");
?>
