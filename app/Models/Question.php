<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Question extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'question',
        'image_url',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'position',
        'correct_answer',
        'quiz_id'
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
