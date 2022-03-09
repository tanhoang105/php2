<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>danh sách quiz</title>
     <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
     header {
          height: 100%;
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

     .tenMon {
          margin-left: -10px;
          margin-bottom: 30px;
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
                    <div class="col col-lg-8 tai-khoan" style="padding-top: 28px;padding-left: 626px;">
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
                    <h3 class="tenMon">Môn học : <?= $subject->name ?></h3>
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">Mã Quiz</th>
                                   <th scope="col">Tên Quiz</th>
                                   <th scope="col">Thời gian Làm</th>
                                   <th scope="col">Làm bài</th>

                              </tr>
                         </thead>
                         <tbody>


                              <?php foreach ($quizs as $q) : ?>
                                   <tr>
                                        <th scope="row"><?= $q->id ?></th>
                                        <td><?= $q->name ?></td>
                                        <td><?= $q->duration_minutes ?> phút</td>
                                        <td>
                                             <a href="<?= BASE_URL . 'quiz/lam-bai?id='  . $q->id  ?>" class="btn btn-success">Làm bài</a>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </main>


</body>

</html>