<?php
namespace App;

class Question 
{
    protected $body;

    protected $solution;

    public function __construct($body, $solution)
    {
       
        $this->body = $body;
        $this->solution = $solution;

    }

    public function answer($answer)
    {

    }
}