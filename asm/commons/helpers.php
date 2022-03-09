<?php

const BASE_URL = "http://localhost/we16302-php2/asm/";
const PUBLIC_URL = BASE_URL . 'public/';
const ADMIN_URL = 1 ;
const STUDENT_URL = 2;
function checkRole($roleID){
    if(!isset($_SESSION['auth']) || $_SESSION['auth']['role_id'] == $roleID){
          header('location:' . BASE_URL . 'login?msg=Bạn không có quyền truy cập');
          die();
     }
}



function save_img($file,$path_dir = './public/img/'){
        $file_upload = $_FILES[$file];
     //    $path_dir = './public/img/';
        $file_name = $file_upload['name'];
        $path_file_dir = $path_dir . $file_name;
        move_uploaded_file($file_upload['tmp_name'], $path_file_dir);
        return $file_name;
}
