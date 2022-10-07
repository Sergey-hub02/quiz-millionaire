<?php

require_once "C:/Users/spark/Documents/Testing/millionaire/src/include/question/Question.php";

use PHPUnit\Framework\TestCase;

class QuestionTest extends TestCase {
  /**
   * Передача [] в качестве вариантов ответа
   */
  public function testSetOptions(): void {
    $this->expectException(Exception::class);
    $question = new Question();
    $question->setOptions([]);
  }

  /**
   * Передача отрицательного значения в качестве количества очков за правильный ответ
   */
  public function testSetPoints(): void {
    $this->expectException(Exception::class);
    $question = new Question();
    $question->setPoints(-190);
  }
}
