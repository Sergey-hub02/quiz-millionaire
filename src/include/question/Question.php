<?php

/**
 * Класс, представляющий вопрос
 */
class Question {
  // идентификатор вопроса
  private int $id;

  // формулировка вопроса
  private string $text;

  // варианты ответов на вопрос
  private array $options;

  // правильный ответ
  private string $answer;

  // количество очков за правильный ответ
  private int $points;

  /**
   * Инициализирует все поля объекта
   * @param int $id             идентификатор вопроса
   * @param string $text        формулировка вопроса
   * @param array $options      варианты ответов на вопрос
   * @param string $answer      правильный ответ
   * @param int $points         количество очков за правильный ответ
   */
  public function __construct(
    int $id = 0,
    string $text = "",
    array $options = [],
    string $answer = "",
    int $points = 0
  ) {
    $this->id = $id;
    $this->text = $text;
    $this->options = $options;
    $this->answer = $answer;
    $this->points = $points;
  }

  /**
   * Геттер для поля id
   * @return int      id вопроса
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * Сеттер для поля id
   * @param int $id       новый id вопроса
   */
  public function setId(int $id): void {
    $this->id = $id;
  }

  /**
   * Геттер для поля text
   * @return string     формулировка вопроса
   */
  public function getText(): string {
    return $this->text;
  }

  /**
   * Сеттер для поля text
   * @param string $text      новая формулировка вопроса
   */
  public function setText(string $text): void {
    $this->text = $text;
  }

  /**
   * Геттер для поля options
   * @return string[]       варианты ответов
   */
  public function getOptions(): array {
    return $this->options;
  }

  /**
   * Сеттер для поля options
   * @param string[] $options новые варианты ответов
   * @throws Exception
   */
  public function setOptions(array $options): void {
    if (count($options) === 0) {
      throw new Exception("[ERROR]: У вопроса должны быть варианты ответов!");
    }
    $this->options = $options;
  }

  /**
   * Геттер для поля answer
   * @return string       правильный ответ
   */
  public function getAnswer(): string {
    return $this->answer;
  }

  /**
   * Сеттер для поля answer
   * @param string $answer      новый правильный ответ
   */
  public function setAnswer(string $answer): void {
    $this->answer = $answer;
  }

  /**
   * Геттер для поля points
   * @return int        количество очков за правильный ответ
   */
  public function getPoints(): int {
    return $this->points;
  }

  /**
   * Сеттер для поля points
   * @param int $points новое количество очков за правильный ответ
   * @throws Exception
   */
  public function setPoints(int $points): void {
    if ($points <= 0) {
      throw new Exception("[ERROR]: Количество очков за вопрос должно быть положительным!");
    }

    $this->points = $points;
  }
}
