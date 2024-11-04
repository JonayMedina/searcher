<?php

namespace App\Entity;

use App\Core\AbstractSearchResult;

class Exam extends AbstractSearchResult
{
    private string $examType;

    public function __construct(string $name, string $examType)
    {
        parent::__construct($name);
        $this->examType = $examType;
    }

    public function getExamType(): string
    {
        return $this->examType;
    }

    public function getType(): string
    {
        return 'Examen';
    }

    public function toString(): string
    {
        return sprintf("%s: %s | %s", $this->getType(), $this->name, $this->examType);
    }
}