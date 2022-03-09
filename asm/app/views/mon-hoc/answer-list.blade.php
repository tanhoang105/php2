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

     .nopBai,
     .cauTraLoi {
          text-decoration: none;
          font-weight: 500;
          color: #000;
     }

     .a {
          color: #000;
          font-weight: 600;
          text-decoration: none;
     }
</style>

<body>
     <header>
          <div class="container-fluid">
               <div class="row">
                    <div class="col col-lg-4">
                         <img src="<?= PUBLIC_URL . 'img/logo_poly.png' ?>" alt="">
                    </div>
                    <div class="col col-8 taiKhoan">
                         <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                   <?php
                                   if (isset($_SESSION['admin'])) {
                                        echo 'Xin chào : ' . $_SESSION['admin']['name_admin'];
                                   }
                                   ?>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                   <li><a class="dropdown-item" href="#">Thông tin</a></li>
                                   <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </header>
     <main>
          <?php


          use App\Models\Answer;
          use App\Models\BaseModel;

          ?>
          <div class="container-fluid">
               <div class="row">
                    <div class="col col-lg-2  nav-bar">
                         <ul>
                              <li><a href="">Sinh viên</a></li>
                              <li><a href="<?= BASE_URL . 'admin' ?>">Môn học</a></li>
                              <li><a href="">Khác</a></li>
                         </ul>
                    </div>

                    <div class="col col-lg-10 show-info">
                         <div class="row them">
                              <div class="col-lg-10">

                              </div>
                              <div class="col-lg-2">
                                   <button class="btn btn-success"><a class="a" href="<?= BASE_URL . 'quiz/anwser-add?id_question='  . $_GET['id_question'] ?>">Thêm câu trả lời</a></button>
                              </div>
                         </div>
                         <div class="row">
                              <form action="" method="post">


                                   <div class="col col-lg-12">

                                        <table class="table">
                                             <thead>
                                                  <tr>
                                                       <th scope="col">Mã trả lời</th>
                                                       <th scope="col">Nội dung trả lời</th>
                                                       <th scope="col">Action</th>

                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php foreach ($answers as $key => $a) : ?>
                                                       <tr>
                                                            <th scope="row"><?= $a->id ?> </th>
                                                            <td><?= $a->content ?></td>
                                                            <td>
                                                                 <button class="btn btn-danger"><a class="a" href="<?= BASE_URL . 'answer-delete?id_answer=' . $a->id  . '&id_question=' . $_GET['id_question']  ?>">Xóa</a></button>
                                                                 <button class="btn btn-warning"><a class="a" href="<?= BASE_URL . 'answer-eidt?id_answer=' . $a->id . '&id_question=' . $_GET['id_question'] ?>">Sửa</a></button>
                                                            </td>

                                                       </tr>



                                             </tbody>
                                        <?php endforeach; ?>
                                        </table>


                                   </div>




                              </form>
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