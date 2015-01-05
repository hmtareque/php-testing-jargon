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

    public function test_it_can_be_graded()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("what is 2+2?", 4));

        $question = $quiz->nextQuestion();

        $question->answer(4);

        $this->assertEquals(100, $quiz->grade());
    }

    public function test_it_can_be_failed_quiz()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("what is 2+2?", 4));

        $question = $quiz->nextQuestion();

        $question->answer("incorrect answer");

        $this->assertEquals(0, $quiz->grade());
    }
}