<?php
session_start();
include "data.php";
include "cart.php";
$cart = @$_SESSION['cart'];
$total = 0;
$jumlah_beli = 0;
if (count($cart) > 0) {
    foreach ($cart as $val_produk) {
        $total += $val_produk['harga'] * $val_produk["quantity"];
        $jumlah_beli += $val_produk['quantity'];
    }
    mysqli_query($conn, "insert into transaksi (id_customer, id_menu, tanggal_transaksi, jumlah_beli, total) value ('" . $_SESSION['id_customer'] . "', '" . "1" . "', '" . date('Y-m-d') . "', '".$jumlah_beli."','" . $total. "')");
    $id = mysqli_insert_id($conn);
    foreach ($cart as $key_produk => $val_produk){
        mysqli_query($conn, "insert into detail_transaksi (id_menu,id_transaksi,jumlah_beli) value('" . $val_produk['id_menu'] . "','" . $id . "','" . $val_produk['quantity'] . "')");
    }
    unset($_SESSION['cart']);
    echo '<script>alert("Enjoy your meal!");location.href="histori_transaksi.php"</script>';
}
?>