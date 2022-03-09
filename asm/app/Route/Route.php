<?php

namespace App\Route;

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\UserController;
use App\Controllers\SubjectController;
use App\Models\Subject;
use App\Models\User;
use \Phroute\Phroute\RouteCollector;

class Route
{
     public static function run($url)
     {

          $router = new RouteCollector();
         
          // ================================== code làm bài lab 4 chuyển hết index thành router

          // dùng filter để chheck login
          $router->filter('auth', function () {
               if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
                    header('location: ' . BASE_URL . 'login');
                    die;
               }
          });

          $router->filter('admin_role', function () {
               if (!isset($_SESSION['auth']) || empty($_SESSION['auth']) || $_SESSION['auth']['role_id'] != 1) {
                    header('location: ' . BASE_URL . 'login');
                    die;
               }
          });

          $router->filter('student_role', function () {
               if (!isset($_SESSION['auth']) || empty($_SESSION['auth']) || $_SESSION['auth']['role_id'] != 2) {
                    header('location: ' . BASE_URL . 'login');
                    die;
               }
          });

          // router user

          //  thẻ mở 
          $router->get('/', [SubjectController::class, 'index']);
          $router->post('check-login', [LoginController::class, 'postLogin']);
          $router->get('mon-hoc', [SubjectController::class, 'index']);
          $router->get('login', [LoginController::class, 'login']);
          $router->get('sign-up', [LoginController::class, 'registerForm']);
          $router->get('tao-tai-khoan', [LoginController::class, 'createAccount']);
          $router->get('mon-hoc/chi-tiet', [SubjectController::class, 'detailSubject']);
          $router->get('quiz/lam-bai', [QuizController::class, 'questionByidquiz_student'], ['before' => 'auth']);
          $router->post('nop-bai/quiz', [QuizController::class, 'finishQuiz']);
          $router->any('logout', [LoginController::class, 'logout']); 

          // thẻ đóng


          //router admin

          // admin thong ke sinh vien
          $router->group(['before' => 'admin_role'], function ($router) {
               $router->group(['prefix' => 'admin'], function ($router) {
                    $router->get('/', [LoginController::class, 'admin']);
                    $router->get('student', [DashboardController::class, 'sinhvien']);
                    $router->get('student-info', [DashboardController::class, 'sinhvien_detail']);
                    $router->get('quiz', [DashboardController::class, 'quiz_list']);
                    $router->get('quiz-detail', [DashboardController::class, 'quiz_detail']);
               });

               // admin môn học
               $router->group(['prefix' => 'mon-hoc'], function ($router) {

                    $router->get('chi-tiet-admin', [SubjectController::class, 'detailSubject_Admin']);
                    $router->get('tao-moi', [SubjectController::class, 'addForm']);
                    $router->post('luu-tao-moi', [SubjectController::class, 'saveAdd']);
                    $router->get('xoa', [SubjectController::class, 'remove']);
                    $router->get('cap-nhat', [SubjectController::class, 'editForm']);
                    $router->post('luu-cap-nhat', [SubjectController::class, 'saveEdit']);
               });

               // admin quiz
               $router->group(['prefix' => 'quiz'], function ($router) {
                    $router->get('tao-moi', [QuizController::class, 'creatQuiz']);
                    $router->post('luu-tao-moi', [QuizController::class, 'saveQuiz']);
                    $router->get('chitiet-admin', [QuizController::class, 'questionByidquiz']);
                    $router->get('xoa', [QuizController::class, 'deleteQuiz']);

                    // câu trả lời
                    $router->get('cau-tra-loi', [QuizController::class, 'answersByquestion']);
                    $router->get('anwser-add', [QuizController::class, 'answerAdd']);
                    // câu hỏi
                    $router->get('edit-question', [QuizController::class, 'formEditQuestion']);
               });
               // admin câu trả lời
               $router->post('answer-add/luu', [QuizController::class, 'Saveanswer']);
               $router->get('answer-delete', [QuizController::class, 'RemoveAnswer']);
               $router->get('answer-eidt', [QuizController::class, 'formEditAnswer']);
               $router->post('answer-edit/luu', [QuizController::class, 'saveEditAnswer']);


               // admin question
               $router->get('question-add', [QuizController::class, 'formAddQuestion']);
               $router->post('question-add/luu', [QuizController::class, 'questionAdd']);
               $router->get('question-xoa', [QuizController::class, 'removeQuestion']);
               $router->post('question-edit/luu', [QuizController::class, 'saveEditQuestion']);


              
          });

          // $router->get('test-layout' , function(){
          //      return view('layout.main');
          // });

          // $router-> get('/', [SubjectController::class , 'index']);











          // =================== kết thúc phần lab 4 thay thế index thành router
          # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
          $dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());

          $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));

          // Print out the value returned from the dispatched function
          echo $response;
     }
}
