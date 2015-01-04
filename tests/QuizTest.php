<?php
namespace Tests;

use App\Question;
use App\Quiz;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    public function test_it_consists_of_questions()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("what is 2+2?", 4));

        $this->assertCount(1, $quiz->questions());

    }
}