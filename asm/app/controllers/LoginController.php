<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Subject;


class LoginController{
    
    public function registerForm(){
        // hiện ra form đăng ký 
        include_once './app/views/auth/register-form.php';
    }

    public function createAccount(){
        // hàm tại tài khoản
        $data = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
            
        ];

        $model = new User();
        $model->insert($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function login(){
        // hiện ra form dằng nhập
        include_once "./app/views/auth/login-form.php";
       
    }


    


    public function postLogin(){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            header('location:' . BASE_URL . 'login?msg=hãy đăng nhập email/mật khẩu');
            die();
        }
        $user = User::where('email',$email)->first();
        if($user && password_verify($password, $user->password)){
        
            if($user->role_id == 2){
                // là sinh viên     
                $_SESSION['auth'] = [
                    'id'=> $user->id,
                    'name_sv' => $user->name,
                    'role_id' => $user->role_id,
                ];
                
                header('location: ' . BASE_URL . 'mon-hoc');
                die;
            }else {
                $_SESSION['auth'] = [
                    'id'=> $user->id,
                    'name_admin' => $user->name,
                    'role_id' => $user->role_id,

                ];
                
                header('location: ' . BASE_URL . 'admin');
                die;
            }
            
        }
        

    }


    public function logout(){
        unset($_SESSION['auth']);
        header('location:' . BASE_URL . 'login' );
        die();
    }


    public function admin(){
        //khi đăng nhập thành công
        // khi student đăng nhập thành công
        $subjects = Subject::all();
        return view('admin.index', [
            'subjects' => $subjects
        ]);

        // include_once "./app/views/admin/index.php";
    }
}

?>