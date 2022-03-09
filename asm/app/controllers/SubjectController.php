<?php

namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Support\Facades\View;

class SubjectController
{

    public function index()
    {
        // khi student đăng nhập thành công
        $subjects = Subject::all();
        return view('mon-hoc.index', [
            'subjects' => $subjects
        ]);

        // include_once "./app/views/mon-hoc/index.php";
    }

    public function addForm()
    {
        // khi giáo viên thêm môn học
    
        include_once "./app/views/mon-hoc/add-form.php";
        // header('location:' . BASE_URL . 'views/mon-hoc/add-form.php');
       
    }
    public function editForm()
    {
        // khi giáo viên chỉnh sửa môn học
        $id = $_GET['id'];
        $model = Subject::where('id', $id)->first();
        if (!$model) {
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }
        // include_once './app/views/mon-hoc/edit-form.php';
        return view('mon-hoc.edit-form', [
            'model' => $model
        ]);
    }
    public function saveEdit()
    {   
        extract($_POST);
        // khi giáo viên sửa môn học xong và ấn lưu
        $id = $_GET['id'];
        // $model = Subject::where('id',$id)->first();
        $model = Subject::find($id);
        if (!$model) {
            header('location: ' . BASE_URL . 'admin');
            die;
        }

        // $anh  = save_img('anh');
        // $anh = strlen($anh) > 0 ? $anh  : $anh_old ;
        $file = $_FILES['img'];
        // echo '<pre>';
        // var_dump($file);
        // die();
        if ($file['size'] > 0) {
            move_uploaded_file($file['tmp_name'], './public/img/' . $file['name']);
            $model->name = $name;
            $model->anh = $file['name'];          
            $model->save();
            header('location: ' . BASE_URL . 'admin');
            die;
       }else{
           $anh = $_POST['anh_old'];
           $model->name = $name;
           $model->anh = $anh;          
           $model->save();
           header('location: ' . BASE_URL . 'admin');
           die;
       }
        // $data = [

        //     'name' => $_POST['name'],
        //     'anh' => $file['name']
        // ];
        // $model->update($data);
        // $model->save();
        // header('location: ' . BASE_URL . 'admin');
        // die;
    }


    public function saveAdd()
    {
        // khi giáo viên tạo môn học mới
        // $model = new Subject();
        $anh  = save_img('anh');
        $anh = strlen($anh) > 0 ? $anh  : '';
        // $data = [
        //     'name' => $_POST['name'],
        //     // 'anh' => $_FILES['anh']['name']
        //     'anh' => $anh
        // ];
        $subject = Subject::create([
            'name'=> $_POST['name'],
            'anh'=> $anh
        ]);
        $subject->save();

        // cách 2 :  insert 
        // Subject::create($_POST);

        
      
        header('location: ' . BASE_URL . 'admin');
        die;
    }

    public function remove()
    {
        // khi giáo viên xóa môn học 
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'admin');
        die;
    }

    public function detailSubject()
    {
        // khi học sinh ấn vào môn học sẽ hiện ra quiz của môn học đó 
        $subId = $_GET['id'];
        // fist trả về 1 bản ghi còn get trả về nhiều bản ghi
        $subject = Subject::where('id', $subId)->first();
        $quizs = Quiz::where('subject_id', $subId)->get();
       
        if (empty($subject)) {
            header('location:' . BASE_URL);
            die();
        }
        return view('mon-hoc.quiz-list', [
            'subject' => $subject,
            'quizs'=> $quizs
        ]);
        // include_once './app/views/mon-hoc/quiz-list.php';
       
    }



    public function detailSubject_Admin()
    {
        // khi học sinh ấn vào môn học sẽ hiện ra quiz của môn học đó 
        $subId = $_GET['id'];
        // fist trả về 1 bản ghi còn get trả về nhiều bản ghi
        $subject = Subject::where('id', $subId)->first();
        $quizs = Quiz::where('subject_id', $subId)->get();
        // echo "<pre>";
        // var_dump($quizs);
        // die();
        if (empty($subject)) {
            header('location:' . BASE_URL);
            die();
        }
        // include_once './app/views/admin/detaill-subject.php';
        return view('admin.detaill-subject',[
            'subject'=> $subject,
            'quizs'=> $quizs
        ]);
        
    }

    // function demo route {id}
    // public function a($a, $b = 'hello word'){
    //     var_dump($a , $b);
    //     die();
    // }
}
