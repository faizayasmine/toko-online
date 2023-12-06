<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<header class="header_section" style="background-color: black">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
            
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu-admin.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-menu.php">Add Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer.php">Customer</a>
                    </li>
                </ul>
                <div class="user_option">
                    <a href="logout.php" class="order_online">
                        Log Out
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center"></div>

        <ul class="filters_menu">
            <li data-filter="*">All</li>
            <li data-filter="cookies"></li>
            <li data-filter="cromboloni"></li>
            <li data-filter="mile crepes"></li>
        </ul>

        <div class="filters-content">
            <div class="row">
                <?php
                include "data.php";
                if ($_GET) {
                    $qry_menu = mysqli_query($conn, "select * from menu WHERE category='" . $_GET["category"] . "'");
                } else {
                    $qry_menu = mysqli_query($conn, "select * from menu");
                }
                while ($dt_menu = mysqli_fetch_array($qry_menu)) {
                    ?>
                    <div class="col-sm-6 col-lg-4 all cookies">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="images/<?= ($dt_menu['gambar']) ?>">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        <?= $dt_menu['nama_menu'] ?>
                                    </h5>
                                    <p>
                                        <?= $dt_menu['deskripsi'] ?>
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $
                                            <?= $dt_menu['harga'] ?>
                                        </h6>
                                        <a class="edit_menu" href="edit-menu.php?id_menu=<?= $dt_menu['id_menu'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                        <a href="delete-menu.php?id_menu=<?= $dt_menu['id_menu'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>

<script src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>