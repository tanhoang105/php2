<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang chủ khóa học</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    header {
        
        /* background-color: red; */
        border-bottom: 1px solid #000;
    }

    main {
        margin-top: 20px;

    }

    .header-taiKhoan {
        padding-left: 699px;
        padding-top: 37px;
    }

    footer {
        height: 50px;
        margin-top: 20px;
        border-top: 1px solid black;
        padding-top: 30px;
    }

    ul>li {
        display: inline-block;
        margin-right: 10px;
        text-decoration: none;
    }

    .item {
        margin-bottom: 30px;
    }
    .diem{
         text-align: center;
    }
    .a {
         text-decoration: none;
         font-weight: 600;
         color: #fff;
    }
</style>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col col-lg-4">
                    <div class="header-logo-img">
                        <img src="<?= PUBLIC_URL . 'img/logo_poly.png' ?>" alt="" height="100px" width="200px">
                    </div>
                </div>
                <div class="col col-lg-8 tai-khoan" style="padding-top: 30px; padding-left:522px">
                    <?php
                    if (!isset($_SESSION['auth'])) {
                        echo '<button type="button" class="btn btn-secondary"><a class="a" href="' . BASE_URL . 'login' . '">Đăng Nhập</a></button>';
                    } else {
                        echo "Xin chào : " . $_SESSION['auth']['name_sv'] . '    ';
                        echo '<button type="button" class="btn btn-secondary"><a class="a" href="' . BASE_URL . 'logout' . '">Đăng Xuất</a></button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="show">
                     <h2 class="diem">Điểm của bạn là <?= round($point*10/$sum, 2); ?></h2>
                     <h2 class="diem">Số câu đúng :  <?= $point . '/' . $sum ?></h2>
                     <button class="btn btn-success"><a class="a" href="<?= BASE_URL . 'mon-hoc' ?>">Trang Chủ</a></button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
                <div class="info">
                    <p>© FPT Polytechnic | Course Management System. All rights reserved except where noted. edX, Open edX and their respective logos are registered trademarks of edX Inc.</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>