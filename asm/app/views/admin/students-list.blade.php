<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>trang chủ admin</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
     .taiKhoan {

          padding-left: 904px;
          margin-top: 59px;

     }

     header {
          border-bottom: 1px solid black;
     }

     .nav-bar {
          background-color: #000;
     }

     main {
          height: 5000px;
          margin-top: 30px;
     }

     .nav-bar,
     .show-info {
          height: 1000px;
     }

     ul>li {
          text-decoration: none;
          margin-top: 30px;
          list-style: none;
          text-decoration: none;
          font-size: 25px;
          font-weight: 600;

     }

     ul>li a {
          text-decoration: none;
          color: #fff;

     }

     .themMonhoc {
          text-decoration: none;
          color: #fff;

     }

     .them {
          margin-bottom: 20px;
     }

     .item {
          margin-bottom: 20px;
     }

     .a {
          text-decoration: none;
          color: #000;
          font-weight: 600;

     }
</style>

<body>
     <header>
          <div class="container-fluid">
               <div class="row">
                    <div class="col col-lg-4">
                         <img src="<?= PUBLIC_URL . 'img/logo_poly.png' ?>" alt="">
                    </div>
                    <div class="col col-8 taiKhoan" style=" padding-left: 904px; margin-top: 59px;">
                         <?php
                         if (!isset($_SESSION['auth'])) {
                              echo '<button type="button" class="btn btn-secondary"><a class="a" href="' . BASE_URL . 'login' . '">Đăng Nhập</a></button>';
                         } else {
                              // echo "Xin chào : " . $_SESSION['auth']['name_admin'] . '    ';
                              echo '<button type="button" class="btn btn-secondary">XIN CHÀO : '.  $_SESSION['auth']['name_admin'].'</button>' . '    ';

                              
                              echo '<button type="button" class="btn btn-secondary"><a class="a" href="' . BASE_URL . 'logout' . '">Đăng Xuất</a></button>';
                         }
                         ?>

                    </div>
               </div>
          </div>
     </header>
     <main>
          <div class="container-fluid">
               <div class="row">
                    <div class="col col-lg-2  nav-bar">
                         <ul>
                              <li><a href="<?= BASE_URL . 'admin/student' ?>">Sinh viên</a></li>
                              <li><a href="<?= BASE_URL . 'admin' ?>">Môn học</a></li>
                              <li><a href="<?= BASE_URL . 'admin/quiz' ?>">Quiz</a></li>
                         </ul>
                    </div>

                    <div class="col col-lg-10 show-info">
                         <div class="row them">
                              <div class="col-lg-10">
                              </div>
                              <div class="col-lg-2">
                              </div>
                         </div>
                         <div class="row">
                              <table class="table">
                                   <thead>
                                        <tr>
                                             <th scope="col">Mã sinh viên</th>
                                             <th scope="col">Tên sinh viên</th>
                                             <th scope="col">Email</th>
                                             <th scope="col">Chi tiết</th>

                                        </tr>
                                   </thead>
                                   <tbody>


                                        <?php foreach ($students as $st) : ?>
                                             <tr>
                                                  <th scope="row"><?= $st->id ?></th>
                                                  <td><?= $st->name ?></td>
                                                  <td><?= $st->email ?></td>
                                                  <td>
                                                       <button class="btn btn-warning"><a class="a" href="<?= BASE_URL . 'admin/student-info?id_st=' . $st->id  ?>">Chi tiết</a></button>
                                                  </td>

                                             </tr>
                                        <?php endforeach; ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </main>



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>