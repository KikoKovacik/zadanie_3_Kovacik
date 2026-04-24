<?php

namespace App\Services;

use App\Core\Database;

class QnA extends Database
{
    private string $dataConfigKey;

    public function __construct(string $dataConfigKey = 'qna_data_file')
    {
        parent::__construct();
        $this->dataConfigKey = $dataConfigKey;
    }

    /**
     * Nacita zoznam otazok a odpovedi z JSON "databazy".
     *
     * @return array<int, array{question: string, answer: string}>
     */
    public function getAllQuestionsAndAnswers(): array
    {
        $decoded = $this->getJsonData($this->dataConfigKey);

        $result = [];
        foreach ($decoded as $item) {
            if (!is_array($item)) {
                continue;
            }

            $question = isset($item['question']) && is_string($item['question']) ? trim($item['question']) : '';
            $answer = isset($item['answer']) && is_string($item['answer']) ? trim($item['answer']) : '';

            if ($question === '' || $answer === '') {
                continue;
            }

            $result[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }

        return $result;
    }

    /*
    public function insertQuestionAndAnswer(string $question, string $answer): bool
    {
        // Metoda pre vkladanie otazok/odpovedi je podla zadania zakomentovana.
        // V pripade potreby je mozne ju znova aktivovat.
        return false;
    }
    */
}
