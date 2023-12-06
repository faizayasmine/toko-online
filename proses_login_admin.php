<?php
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)) {
        echo "<script>alert('Email tidak boleh kosong');location.href='login-admin.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='login-admin.php';</script>";
    } else {
        include "data.php";
        $qry_login = mysqli_query($conn, "select * from user where email = '" . $email . "' and password = '" . md5($password) . "'and role = '" . "admin" . "'");
        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_customer'] = $dt_login['id_customer'];
            $_SESSION['nama_customer'] = $dt_login['nama_customer'];
            $_SESSION['status_login'] = true;
            header("location: admin.php");
        } else {
            echo "<script>alert('Email dan Password tidak benar');location.href='login-admin.php';</script>";
        }
    }
}
?>