<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model{
    protected $table = 'subjects';
    protected $fillable = ['name' , 'author_id', 'anh'];

    
    public $timestamps = false;
    
    // lấy quiz thep subject

    public function countQuiz(){
        return Quiz::where('subject_id', $this->id)->get();
        return $this->hasMany(Quiz::class , 'subject_id'); // lấy ra những quiz có subject_id = id của subject ( tự động so sánh với ID của bảng cha )
    }


    
}
