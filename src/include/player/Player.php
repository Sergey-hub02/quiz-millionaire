<?php

/**
 * Класс, представляющий игрока
 */
class Player {
  // имя игрока
  private string $name;

  // счёт игрока
  private int $score;

  /**
   * Создаёт игрока со счётом 0
   * @param string $name      имя игрока
   */
  public function __construct(string $name) {
    $this->name = $name;
    $this->score = 0;
  }

  /**
   * Геттер для поля name
   * @return string       имя игрока
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * Сеттер для поля name
   */
  public function setName(string $name): void {
    $this->name = $name;
  }

  /**
   * Геттер для поля score
   * @return int      счёт игрока
   */
  public function getScore(): int {
    return $this->score;
  }

  /**
   * Сеттер для поля score
   * @param int $score новый счёт игрока
   * @throws Exception
   */
  public function setScore(int $score): void {
    if ($score < 0) {
      throw new Exception("[ERROR]: Счёт должен быть положительным или равным 0!");
    }

    $this->score = $score;
  }

  /**
   * Увеличивает счёт игрока на заданное количество очков
   * @param int $score насколько увеличивается счёт игрока
   * @throws Exception
   */
  public function increaseScore(int $score): void {
    if ($score <= 0) {
      throw new Exception("[ERROR]: Приращение должно быть положительным!");
    }
    $this->setScore($this->getScore() + $score);
  }
}
