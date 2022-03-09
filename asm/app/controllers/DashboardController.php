<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\Subject;
use App\Models\User;

class DashboardController{

    // khi admin ấn vào sinh viên
    public function sinhvien(){
        // lấy ra tất cả sinh viên có trong bản user (role_id == 2)
        $students = User::where('role_id' , 2)->get();
        // echo '<pre>';
        // var_dump($students);


        // include_once './app/views/admin/students-list.php';
        return view('admin.students-list', [
            'students' => $students
        ]);
    }

    // khi admin ấn vào chi tiết sinh viên 

    public function sinhvien_detail(){
        $id_student = $_GET['id_st'];
        // lấy ra tất cả quiz
        $quizs = Quiz::all();
        // var_dump($quiz);
        // die();
        $model = StudentQuiz::where('student_id', $id_student)->get();
        

        // include_once './app/views/admin/student-detail.php';
        return view('admin.student-detail', [
            'quizs' => $quizs,
            'model'=> $model
        ]);

    }

    // khi admin ấn vào quiz
    public function quiz_list(){
        $quizs = Quiz::all();
        $subjects  = Subject::all();

        // include_once './app/views/admin/quiz.php' ;
        return view('admin.quiz', [
            'quizs'=> $quizs,
            'subjects' => $subjects
        ]);
    }

    // khi admin ấn vào chi tiết quiz

    public function quiz_detail(){
        $id_quiz  = $_GET['id_quiz'];
        
        // lấy ra tất cả những sinh viên đã làm quiz đó và có kèm theo điểm
        $students = StudentQuiz::where('quiz_id',$id_quiz)->get();
        $list_user = User::where('role_id' , 2)->get();

        // include_once './app/views/admin/quiz-detail.php' ;
        return view('admin.quiz-detail', [
            'students'=> $students,
            'list_user'=> $list_user
        ]);
    }
}
?>