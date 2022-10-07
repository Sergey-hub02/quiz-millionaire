<?php

require_once "C:/Users/spark/Documents/Testing/millionaire/src/include/question/QuestionDAO.php";

use PHPUnit\Framework\TestCase;

class QuestionDAOTest extends TestCase {
  /**
   * Тест на ненайденный json-файл
   */
  public function testConstructor(): void {
    $this->expectError();
    $qDAO = new QuestionDAO("heh heh heh... SIIUUU!");
  }

  /**
   * Тест нахождения несуществующего объекта
   */
  public function testReadOne(): void {
    $qDAO = new QuestionDAO();
    $result = $qDAO->readOne(-1);
    $this->assertNull($result);
  }
}
