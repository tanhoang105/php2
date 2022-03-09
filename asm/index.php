<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/db.php';
require_once './commons/lib.php';

$url = isset($_GET['url']) ? $_GET['url'] : "/";
\App\Route\Route::run($url);
// $url mong muốn của người gửi request
/*switch ($url) {
    case '/':
        $ctr = new LoginController();
        $ctr->login();
        break;
    case 'login':
        $ctr = new LoginController();
        $ctr->login();
        break;
    case 'admin':
        $ctr = new LoginController();
        $ctr->admin();
        break;
    case 'check-login':
        $ctr = new LoginController();
        $ctr->postLogin();
        break;
    case 'dang-ky':
        $ctr = new LoginController();
        $ctr->registerForm();
        break;
    case 'tao-tai-khoan':
        $ctr = new LoginController();
        $ctr->createAccount();
        break;
    case 'dashboard':
        $ctr = new DashboardController();
        // $ctr->index();
        break;
    case 'logout':
        $ctr =  new LoginController();
        $ctr->logout();
        break;
    case 'mon-hoc':
        $ctr = new SubjectController();
        $ctr->index();
        break;
    case 'mon-hoc/tao-moi':
        $ctr = new SubjectController();
        $ctr->addForm();
        break;
    case 'mon-hoc/luu-tao-moi':
        $ctr = new SubjectController();
        $ctr->saveAdd();
        break;
    case 'mon-hoc/cap-nhat':
        $ctr = new SubjectController();
        $ctr->editForm();
        break;
    case 'mon-hoc/luu-cap-nhat':
        $ctr = new SubjectController();
        $ctr->saveEdit();
        break;
    case 'mon-hoc/xoa':
        $ctr = new SubjectController();
        $ctr->remove();
        break;
    case 'mon-hoc/chi-tiet':
        $ctr = new SubjectController();
        $ctr->detailSubject();
        break;
    case 'mon-hoc/chi-tiet-admin':
        $ctr = new SubjectController();
        $ctr->detailSubject_Admin();
        break;
    case 'quiz':  
        break;
    case 'user/tao-moi':
        $ctr = new UserController();
        $ctr->addUser();
        break;
    case 'user':
        $ctr = new UserController();
        $ctr->index();
        break;
    case 'user/luu-tao-moi':
        $ctr = new UserController();
        $ctr->saveAdd();
        break;
    case 'user/xoa':
        $ctr = new UserController();
        $ctr->remove();
        break;
    case 'quiz/tao-moi':
        $ctr = new QuizController();
        $ctr->creatQuiz();
        break;
    case 'quiz/luu-tao-moi':
        $ctr = new QuizController();
        $ctr->saveQuiz();
        break;
    case 'quiz/cap-nhat':

        break;
    case 'quiz/luu-cap-nhat':
        break;
    case 'quiz/xoa':
        $ctr = new QuizController();
        $ctr->deleteQuiz();
        break;
    case 'quiz/chitiet-admin':
        $ctr = new QuizController();
        $ctr->questionByidquiz();
        break;
    case 'quiz/lam-bai':
        $ctr = new QuizController();
        $ctr->questionByidquiz_student();
        break;
    case 'question-xoa':
        $ctr = new QuizController();
        $ctr->removeQuestion();
        break;
    case 'question-add':
        $ctr = new QuizController();
        $ctr->formAddQuestion();
        break;
    case 'quiz/cau-tra-loi':
        $ctr = new QuizController();
        $ctr->answersByquestion();
        break;
    case 'question-add/luu':
        $ctr = new QuizController();
        $ctr->questionAdd();
        break;
    case 'quiz/anwser-add':
        $ctr = new QuizController();
        $ctr->answerAdd();
        break;

    case 'answer-add/luu':
        $ctr = new QuizController();
        $ctr->Saveanswer();
        break;
    case 'nop-bai/quiz':
        $ctr = new QuizController();
        $ctr->finishQuiz();
    case 'quiz/edit-question':
        $ctr = new QuizController();
        $ctr->formEditQuestion();
        break;
    case 'question-edit/luu':
        $ctr = new QuizController();
        $ctr->saveEditQuestion();
        break;
    case 'answer-eidt':
        $ctr = new QuizController();
        $ctr->formEditAnswer();
        break;

    case 'answer-edit/luu':
        $ctr = new QuizController();
        $ctr->saveEditAnswer();
        break;

    case 'answer-delete':
        $ctr = new QuizController();
        $ctr->RemoveAnswer();
        break;
    default:
        echo "Đường dẫn bạn đang truy cập chưa được cho phép";
        break;
}*/
