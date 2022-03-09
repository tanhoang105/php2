<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<style>
    body {
        background-color: #000;
        height: 100%;
    }
    .container {
        background-color: #fff;
        margin: 300px auto;
        padding: 30px;
        border-radius: 20px;
        box-shadow: #fff 10 10 10;
        width: 600px;
    }
    .form-dangNhap {
        margin-top: 50px;
    }
</style>
<body>
    <div class="container">
        <div class="row form-dangNhap">
            <form action="<?= BASE_URL . 'check-login' ?>" method="post">
                <div class="mb-3">
                    <label for="tenDangNhap" class="form-label">email đăng nhập</label>
                    <input type="text" class="form-control" id="tenDangNhap" name="email">
                </div>


                <div class="mb-3">
                    <label for="matKhau" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="matKhau" name="password">                    
            </div>
                <div>
                    <button type="submit" class="btn btn-success">Đăng Nhập</button>
                

               
                    <button class="btn btn-danger"><a style="text-decoration:none; color: #fff" href="<?= BASE_URL . 'mon-hoc'  ?>">Trang chủ</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>