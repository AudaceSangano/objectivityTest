<?php
class Quiz {
  private $questions;
  private $score;

  public function __construct($questions) {
    $this->questions = $questions;
    $this->score = 0;
  }

  public function run() {
    shuffle($this->questions);
    foreach ($this->questions as $question) {
      $this->displayQuestion($question);
      $answer = $this->getAnswer();
      if ($this->checkAnswer($question, $answer)) {
        $this->score++;
        echo "Correct!<br>";
      } else {
        echo "Incorrect. The correct answer is: " . $question['answer'] . "<br>";
      }
    }
    $this->displayResults();
  }

  private function displayQuestion($question) {
    echo "<br>" . $question['question'] . "<br>";
    foreach ($question['choices'] as $choice) {
      echo "- $choice<br>";
    }
  }

  private function getAnswer() {
    echo "Enter your answer: ";
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    fclose($handle);
    return trim($line);
  }

  private function checkAnswer($question, $answer) {
    return strtolower($answer) === strtolower($question['answer']);
  }

  private function displayResults() {
    $numQuestions = count($this->questions);
    $percentScore = $this->score / $numQuestions * 100;
    echo "<br>You answered $this->score out of $numQuestions questions correctly.<br>";
    echo "Your score: $percentScore%<br>";
  }
}

$questions = array(
  array(
    'question' => 'What is the capital of France?',
    'choices' => array('London', 'Paris', 'Berlin', 'Madrid'),
    'answer' => 'Paris'
  ),
  array(
    'question' => 'Who is the author of "To Kill a Mockingbird"?',
    'choices' => array('Harper Lee', 'J.K. Rowling', 'Stephen King', 'George Orwell'),
    'answer' => 'Harper Lee'
  ),
  array(
    'question' => 'What is the highest mountain in the world?',
    'choices' => array('Mount Everest', 'K2', 'Makalu', 'Cho Oyu'),
    'answer' => 'Mount Everest'
  )
);

$quiz = new Quiz($questions);
$quiz->run();
