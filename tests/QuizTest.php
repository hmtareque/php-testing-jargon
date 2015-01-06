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

    public function test_it_correctly_tracks_the_next_question()
    {
        $quiz = new Quiz();

        $quiz->addQuestion($question1 = new Question("what is 2+2?", 4));
        $quiz->addQuestion($question2 = new Question("what is 2+4?", 6));
        

        $this->assertEquals($question1, $quiz->nextQuestion());
        $this->assertEquals($question2, $quiz->nextQuestion());
        
    }

    public function test_it_cannot_be_graded_until_all_answered()
    {
        
    }
}