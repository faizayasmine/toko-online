<?php
$filename = $_FILES['gambar']['name'];
$filetype = $_FILES['gambar']['type'];
$filetmp_name = $_FILES['gambar']['tmp_name'];
$filesize = $_FILES['gambar']['size'];
$ext = explode(".", $_FILES['gambar']['name']);
$fileExt = strtolower(end($ext));
$err = array();
$extensions = ["png", "jpg", "md", "jpeg"];

if (in_array($fileExt, $extensions) === false) {
    $err[] = "----------Extension is not Allawoed -----";
}

if (empty($err) == true) {
    move_uploaded_file($filetmp_name, "./images/" . $filename);
    echo "----------------File Added ----------";
    var_dump($filetmp_name);
}

if ($_POST) {
    $nama_menu = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $category = $_POST['category'];
    $gambar = "$filename";

    if (empty($nama_menu)) {
        echo "<script>alert('Menu name should be filled');location.href='add-menu.php';</script>";
    } elseif (empty($deskripsi)) {
        echo "<script>alert('Description should be filled');location.href='add-menu.php';</script>";
    } elseif (empty($harga)) {
        echo "<script>alert('Price should be filled');location.href='add-menu.php';</script>";
    } elseif (empty($category)) {
        echo "<script>alert('Category should be filled');location.href='add-menu.php';</script>";
    } elseif (empty($gambar)) {
        echo "<script>alert('Image should be filled');location.href='add-menu.php';</script>";
    } else {
        include "data.php";
        $insert = mysqli_query($conn, "insert into menu (nama_menu, deskripsi, harga, category, gambar) value ('" . $nama_menu . "','" . $deskripsi . "','" . $harga . "','" . $category . "' ,'" . $gambar . "')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Success!');location.href='menu-admin.php';</script>";
        } else {
            echo "<script>alert('Can't add menu. Try again!');location.href='add-menu.php';</script>";
        }
    }
}
?>
