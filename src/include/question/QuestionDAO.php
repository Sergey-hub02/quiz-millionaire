<?php

require_once __DIR__ . "/Question.php";

/**
 * Класс для работы с хранилищем вопросов
 */
class QuestionDAO {
  // json-файл с вопросами
  private string $file = "C:/Users/spark/Documents/Testing/millionaire/storage/questions.json";

  // распарсенный массив вопросов
  private array $storage;

  /**
   * Парсит json-файл и инициализирует массив вопросов
   * @param string $file путь к json-файлу
   * @throws Exception
   */
  public function __construct(string $file = "") {
    // если указано другое хранилище, то используем его
    if (!empty($file))
      $this->file = $file;

    $json = file_get_contents($this->file);
    if ($json === false) {
      throw new Exception("[ERROR]: Файл не $file не найден!");
    }

    $this->storage = array_map(
      function (array $element) {

        return new Question(
          $element["id"],
          $element["text"],
          $element["options"],
          $element["answer"],
          $element["points"]
        );

      },
      json_decode($json, true)["questions"]
    );
  }

  /**
   * Возвращает массив вопросов
   * @return array      массив объектов класса Question
   */
  public function readAll(): array {
    return $this->storage;
  }

  /**
   * Возвращает вопрос по его идентификатору
   * @param int $id              id вопроса
   * @return Question | null     объект класса Question
   */
  public function readOne(int $id): Question | null {
    // id должен быть целым положительным числом
    if ($id <= 0) {
      return null;
    }

    return array_values(
      array_filter(
        $this->storage,
        function (Question $question) use ($id) {
          return $question->getId() === $id;
        }
    )
    )[0];
  }
}
