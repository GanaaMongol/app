<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{   
    use RecordsActivity;
    
    protected $fillable = [
        'test_id', 'number', 'quiz', 'quiz_path'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
