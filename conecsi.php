<?php
    $hostname="localhost";
    $user="root";
    $password="";
    $database="toko_online";

    $connect=mysqli_connect ($hostname, $user,$password,$database);
    
    if($conecsi){
        echo "";
    }
    else{
        die("koneksi ke database gagal").mysqli_connect_error();
    } 

?>