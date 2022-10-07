<?php

require_once __DIR__ . "/include/player/Player.php";
require_once __DIR__ . "/include/question/QuestionDAO.php";
require_once __DIR__ . "/include/Game.php";


/**
 * Запускает работу приложения
 */
function main(): void {
  do {
    echo "Введите Ваше имя: ";
    $username = readline();
  }
  while (empty($username));

  echo PHP_EOL;

  $player = new Player($username);
  $questionDAO = new QuestionDAO();

  $game = new Game($player, $questionDAO);

  try {
    $game->run();
  }
  catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }

  echo PHP_EOL . "Игра окончена!" . PHP_EOL;
}


/**
 * Запуск программы
 */
main();
