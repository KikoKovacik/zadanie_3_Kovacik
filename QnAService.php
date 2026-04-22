<?php

class QnA
{
    private string $dataFile;

    public function __construct(string $dataFile = 'qna.json')
    {
        $this->dataFile = $dataFile;
    }

    /**
     * Nacita zoznam otazok a odpovedi z JSON "databazy".
     *
     * @return array<int, array{question: string, answer: string}>
     */
    public function getAllQuestionsAndAnswers(): array
    {
        if (!file_exists($this->dataFile)) {
            return [];
        }

        $content = file_get_contents($this->dataFile);
        if ($content === false) {
            return [];
        }

        $decoded = json_decode($content, true);
        if (!is_array($decoded)) {
            return [];
        }

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
