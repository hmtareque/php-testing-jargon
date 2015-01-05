<?php

namespace App;

class Quiz {

    protected $questions;
    
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function nextQuestion()
    {
        return $this->questions[0];
    }

    public function questions() {
        return $this->questions;
    }

    public function grade()
    {
        $correct = count($this->correctlyAnsweredQuestions());

        $total = count($this->questions());

        return ($correct/$total)*100;
    }


    public function correctlyAnsweredQuestions() 
    {
        return array_filter($this->questions, function($question){
            return $question->isCorrect();
        });
    }
    
}