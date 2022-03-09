<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Answer extends Model{
    protected $table = 'answers';
    protected $fillable = ['content', 'question_id' , 'is_correct', 'img'];



    public $timestamps = false;

//     public static function destroy_an($id){
//         $model = new static();
//         $model->queryBuilder = "delete from $model->tableName
//                                 where question_id = $id";

//        return $model->execute();
//    }
}
?>