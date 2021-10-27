<?php 
    include "sftp_util.php";
    $id = "root";
    $pass = "1117@Evrang";
    $host = "121.67.246.151";
    $port = 222;
    $local = "/var/www/html/index.html";
    $remote = "/var/www/index.html";
    upload_sftp($id, $pass, $host, $port, $local, $remote);
?>