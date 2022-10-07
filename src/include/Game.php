<?php

require_once __DIR__ . "/player/Player.php";
require_once __DIR__ . "/question/QuestionDAO.php";


/**
 * Класс, отвечающий за геймплей
 */
class Game {
  // игрок
  private Player $player;

  // для работы с вопросами
  private QuestionDAO $questionDAO;

  /**
   * Настраивает параметры игры
   * @param Player $player                игрок
   * @param QuestionDAO $questionDAO      объект для работы с хранилищем вопросов
   */
  public function __construct(Player $player, QuestionDAO $questionDAO) {
    $this->player = $player;
    $this->questionDAO = $questionDAO;
  }

  /**
   * Начинает игровой процесс
   * @throws Exception
   */
  public function run(): void {
    /** @var Question[] $questions */
    $questions = $this->questionDAO->readAll();

    echo "ДОБРО ПОЖАЛОВАТЬ, {$this->player->getName()}!" . PHP_EOL;
    echo "Начинаем игру!" . PHP_EOL;

    foreach ($questions as $num => $question) {
      ++$num;
      echo PHP_EOL;

      /* ВЫВОД ВОПРОСА И ВАРИАНТОВ ОТВЕТА */
      echo "Ваш счёт: {$this->player->getScore()}" . PHP_EOL;

      $points = $question->getPoints();
      echo "Кол-во очков за правильный ответ: $points" . PHP_EOL;

      echo PHP_EOL;
      echo "Вопрос №$num" . PHP_EOL;

      echo $question->getText() . PHP_EOL;

      echo PHP_EOL;
      echo "Варианты ответов:" . PHP_EOL;

      $options = $question->getOptions();
      $amountOfOptions = count($options);

      foreach ($options as $index => $option) {
        ++$index;
        echo "$index) $option" . PHP_EOL;
      }

      echo PHP_EOL;

      /* ВЫБОР ВАРИАНТА ОТВЕТА */
      do {
        echo "Ваш ответ (введите целое число от 1 до $amountOfOptions): ";
        $userAnswer = readline();
      }
      while (
        empty($userAnswer)
        || !is_numeric($userAnswer)
        || str_contains($userAnswer, ".")
        || str_contains($userAnswer, ",")
        || intval($userAnswer) < 1
        || intval($userAnswer) > $amountOfOptions
      );

      /* ПРОВЕРКА ОТВЕТА ИГРОКА */
      $userAnswer = $options[intval($userAnswer) - 1];
      $correctAnswer = $question->getAnswer();

      echo PHP_EOL;

      // игрок ответил неправильно -> игра окончена
      if ($userAnswer !== $correctAnswer) {
        echo "========== ВЫ ПРОИГРАЛИ! ==========" . PHP_EOL;
        echo "Ваш счёт: {$this->player->getScore()}" . PHP_EOL;
        echo PHP_EOL;

        echo "Ваш ответ: $userAnswer" . PHP_EOL;
        echo "Правильный ответ: $correctAnswer" . PHP_EOL;

        return;
      }

      // игрок ответил правильно
      echo "========== ПРАВИЛЬНЫЙ ОТВЕТ! ==========" . PHP_EOL;
      echo "Ваш счёт увеличился на $points очков!" . PHP_EOL;

      $this->player->increaseScore($question->getPoints());

      echo "====================================" . PHP_EOL;
    }

    echo PHP_EOL;
    echo "========== ВЫ ВЫИГРАЛИ! ==========" . PHP_EOL;
    echo "Ваш счёт: {$this->player->getScore()}" . PHP_EOL;
  }
}
