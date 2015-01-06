<?php

namespace App;

class Quiz {

    protected $questions;

    protected $currentQuestion = 1;
    
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function nextQuestion()
    {
        $question = $this->questions[$this->currentQuestion - 1];

        $this->currentQuestion++;

        return $question;
    }

    public function questions() {
        return $this->questions;
    }

    public function isComplete()
    {
        $answeredQuestions = count(array_filter($this->questions, function($question) {
            return $question->answered();
        }));

        $totalQuestions = count($this->questions);

        return $answeredQuestions === $totalQuestions;
    }

    public function grade()
    {

        if(!$this->isComplete()) {
            throw new \Exception('this quiz has not completed');
        }

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