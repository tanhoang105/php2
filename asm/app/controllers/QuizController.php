<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\Subject;

class QuizController
{


     public function questionByidquiz()
     {

          // cho admin
          $quiz_id = $_GET['quiz_id'];
          $questions = Question::where('quiz_id', $quiz_id)->get();
          // $ansers = Answer::where(['question_id', '=', $quiz_id])->get();

          // var_dump($questions);

          // include_once './app/views/mon-hoc/question-list.php';
          return view('mon-hoc.question-list', [
               'questions' => $questions
          ]);
     }


     public function questionByidquiz_student()
     {
          // cho học sinh khi ấn vào làm bài
          $quiz_id = $_GET['id'];
          $questions = Question::where('quiz_id', $quiz_id)->get();

          // $ansers = Answer::where(['question_id', '=', $quiz_id])->get();

          // var_dump($questions);
          // include_once './app/views/mon-hoc/lamquiz.php';
          return view('mon-hoc.lamquiz', [
               'quiz_id' => $quiz_id,
               'questions' => $questions
          ]);
     }


     public function creatQuiz()
     {
          include_once './app/views/admin/add-quiz.php';
     }


     public function saveQuiz()
     {
          extract($_POST);

          // $model = new Quiz();
          // $data = [
          //      'name' => $name,
          //      'subject_id' => $subject_id,
          //      'duration_minutes' => $duration_minutes,
          //      'start_time' => $start_time,
          //      'end_time' => $end_time,
          //      'status' => $status

          // ];
          // $model->insert($data);
          // $quiz= Quiz::create([
          //      'name' => $_POST['name'],
          //      'subject_id' => $subject_id,
          //      'duration_minutes' => $duration_minutes,
          //      'start_time' => $start_time,
          //      'end_time' => $end_time,
          //      'status' => $status
          // ]);
          // $quiz->save();
          Quiz::create($_POST);

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
          return view('admin.detaill-subject', [
               'subject' => $subject,
               'quizs' => $quizs
          ]);
     }


     public function deleteQuiz()
     {
          $id = $_GET['id']; // lấy ra id của quiz cần xóa
          $subId = $_GET['id_subject'];
          //khi xóa quiz thì cần xóa luôn những câu hỏi và câu trả lời của nó 
          $questions = Question::where('quiz_id', $id)->get();
          foreach ($questions as $q) {
               $answers = Answer::where('question_id', $q->id)->get();
               foreach ($answers as $ans) {
                    Answer::destroy($ans->id);
               }
               Question::destroy($q->id);
          }
          Quiz::destroy($id);
          // ===================
          // Quiz::destroy($id);
          // fist trả về 1 bản ghi còn get trả về nhiều bản ghi
          $subject = Subject::where('id', $subId)->first();
          $quizs = Quiz::where('subject_id', $subId)->get();

          if (empty($subject)) {
               header('location:' . BASE_URL);
               die();
          }
          // include_once './app/views/admin/detaill-subject.php';
          return view('admin.detaill-subject', [
               'subject' => $subject,
               'quizs' => $quizs
          ]);
     }


     public function removeQuestion()
     {
          $id_question = $_GET['id_question'];


          $annswes = Answer::where('question_id', $id_question)->get();
          // var_dump($annswes);die();
          foreach ($annswes as $an) {
               Answer::destroy($an->id_question);
          }
          Question::destroy($id_question);


          $quiz_id = $_GET['quiz_id'];
          // $sql = "DELETE FROM answers where question_id = . $id_question ";
          // xóa xong thì quay lại danh sách question
          $questions = Question::where('quiz_id', $quiz_id)->get();
          // include_once './app/views/mon-hoc/question-list.php';
          return view('mon-hoc.question-list', [
               'questions' => $questions
          ]);
     }


     public function formAddQuestion()
     {

          include_once './app/views/admin/question-add.php';
     }


     public function questionAdd()
     {
          extract($_POST);
          // $id_question =  $_GET['id_question'];
          // echo $quiz_id;
          // die();
          // thêm câu hỏi 
          // $model = new Question();
          // // $data = [
          // //      'name' => $name,
          // //      'quiz_id' => $quiz_id

          // // ];
          // $model->insert($data);

          // thêm câu hỏi =  iluminate
          Question::create($_POST);
          // khi đã thêm xong là ấn lưu thì show danh sách câu hỏi
          $quiz_id = $quiz_id;
          $questions = Question::where('quiz_id', $quiz_id)->get();
          // $ansers = Answer::where(['question_id', '=', $quiz_id])->get();

          // var_dump($questions);

          // include_once './app/views/mon-hoc/question-list.php';
          return view('mon-hoc.question-list', [
               'questions' => $questions
          ]);
     }


     public function answersByquestion()
     {
          $id_question = $_GET['id_question'];
          // echo $id_question;
          $annswes = Answer::where('question_id', $id_question)->get();
          // include_once './app/views/mon-hoc/answer-list.php';
          return view('mon-hoc.answer-list', [
               'answers' => $annswes
          ]);
     }

     public function answerAdd()
     {

          include_once './app/views/admin/answer-add.php';
     }
     // khi lập câu trả lời xong và ấn lưu
     public function Saveanswer()
     {
          extract($_POST);
          $id_question = $_GET['id_question'];

          // $model = new Answer();
          // $data = [
          //      'content' => $content,
          //      'question_id' => $id_question,
          //      'is_correct' => $is_correct
          // ];
          // $model->insert($data);
          // echo "<pre>";
          // var_dump($_POST);
          
          // var_dump(count($_POST['content']));
          
          for ($i = 0; $i < count($_POST['content']); $i++) {
              
               $an = Answer::create([
                    'content' => $_POST['content'][$i],
                    'question_id' => $id_question,
                    'is_correct' => $_POST['is_correct'. $i]
               ]);
               $an->save();
          }
          // die();


          // Answer::create($_POST);

          // echo $id_question;
          $annswes = Answer::where('question_id', $id_question)->get();
          // include_once './app/views/mon-hoc/answer-list.php';
          return view('mon-hoc.answer-list', [
               'answers' => $annswes
          ]);
     }

     public function formEditQuestion()
     {

          $id_question = $_GET['id_question'];


          $question = Question::where('id', $id_question)->first();


          if (!$question) {
               header('location: ' . BASE_URL . 'mon-hoc');
               die;
          }
          return view('admin.edit-question', [
               'question' => $question
          ]);
          // include_once './app/views/admin/edit-question.php';
     }

     public function saveEditQuestion()
     {
          extract($_POST);
          // $model = Question::where(['id', '=', $id_question])->first();
          $model = Question::find($id_question);
          $model->name = $name;
          $model->quiz_id;


          $model->save();


          $questions = Question::where('quiz_id', $quiz_id)->get();

          return view('mon-hoc.question-list', [
               'questions' => $questions
          ]);
          // include_once './app/views/mon-hoc/question-list.php';

     }


     public function finishQuiz()
     {
          extract($_POST);
          // var_dump($question_id);
          $point = 0;
          $sum = 0;
          // var_dump($question_id);
          // die();
          foreach ($question_id as $q) {
              
               $answer_is_correct = Answer::where('question_id', $q)->Where('is_correct', 1)->first();
               if (isset($_POST['question_' . $q])) {
                    if ($answer_is_correct->id == $_POST['question_' . $q]) {
                         $point++;
                    }
               }

               $sum++;
          }

          $model = new StudentQuiz();
          $model->insert([
               'student_id' => $_SESSION['auth']['id'],
               'quiz_id' => $quiz_id,
               'score' => $point
          ]);
          // include_once './app/views/mon-hoc/show-diem.php';
          return view('mon-hoc.show-diem', [
               'sum' => $sum,
               'point' => $point
          ]);
     }


     public function formEditAnswer()
     {
          extract($_POST);
          $id_anser = $_GET['id_answer'];
          $answer = Answer::where('id', $id_anser)->first();

          // include './app/views/admin/edit-answer.php';
          return view('admin.edit-answer', [
               'answer' => $answer
          ]);
     }

     public function saveEditAnswer()
     {
          extract($_POST);

          // $model = Answer::where(['id', '=', $id_answer])->first();
          // $data = [
          //      'content' => $content,
          //      'is_correct' => $is_correct,
          //      'question_id' => $id_question

          //  ];
          //  $model->update($data);

          $answer = Answer::find($id_answer);
          $answer->content = $content;
          $answer->is_correct = $is_correct;
          $answer->save();
          // echo $id_question;
          $annswes = Answer::where('question_id', $id_question)->get();
          //  include_once './app/views/mon-hoc/answer-list.php';
          return view('mon-hoc.answer-list', [
               'answers' => $annswes
          ]);
     }


     public function RemoveAnswer()
     {
          extract($_POST);
          $id_answer = $_GET['id_answer'];
          $id_question = $_GET['id_question'];
          Answer::destroy($id_answer);

          // xóa xong thì cần lấy ra danh sách câu trả lời

          $annswes = Answer::where('question_id', $id_question)->get();
          //  include_once './app/views/mon-hoc/answer-list.php';
          return view('mon-hoc.answer-list', [
               'answers' => $annswes
          ]);
          // header('location:' . BASE_URL . 'answer-delete');
          // die();
     }
}
