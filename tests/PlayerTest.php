<?php

require_once "C:/Users/spark/Documents/Testing/millionaire/src/include/player/Player.php";

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase {
  /**
   * Тест передачи неположительного приращения
   */
  public function testIncreaseScore(): void {
    $this->expectException(Exception::class);

    $player = new Player("test");
    $delta = -10;

    $player->increaseScore($delta);
  }

  /**
   * Тест передачи отрицательного счёта игрока
   */
  public function testSetScore(): void {
    $this->expectException(Exception::class);

    $player = new Player("test");
    $score = -100;

    $player->setScore($score);
  }
}
