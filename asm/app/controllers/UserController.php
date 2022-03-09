<?php
namespace App\Controllers;
use App\Models\User;

class userController{
    public function index(){
        $users=User::all();
        include "./app/views/user/index.php";
    }
    public function addUser(){
        include "./app/views/user/addUser.php";
    }
    public function saveAdd(){
        $model = new User();
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role_id' => $_POST['role_id']
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'user');
        die;
    }
    public function remove(){
        $id = $_GET['id'];
        User::destroy($id);
        header('location: ' . BASE_URL . 'user');
        die;
    }
    
}
?>