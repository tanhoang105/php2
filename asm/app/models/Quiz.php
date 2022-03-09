<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model{
    protected $table = 'quizs';
    protected $fillable = ['name', 'subject_id', 'duration_minutes', 'start_time' , 'end_time' , 'status', 'is_shuffle' ];
    // protected $fillable = ['name', 'subject_id', 'start_time', 
    //                         'end_time', 'duration_minutes', 'status', 
    //                         'is_shuffle'];


    public $timestamps = false;


}
?>