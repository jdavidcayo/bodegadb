<?php
session_start();

$con = mysqli_connect(
'localhost',
'admin',
'narampol',
'bodegadb'
);
if(!$con) echo "No conectado a la DB. LPTM";

?>
