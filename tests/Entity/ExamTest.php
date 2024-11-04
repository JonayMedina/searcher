<?php

namespace Tests\Entity;

use App\Entity\Exam;
use PHPUnit\Framework\TestCase;

class ExamTest extends TestCase
{
    public function testExamCreation(): void
    {
        $exam = new Exam('Test de Gramática', 'Selección');
        
        $this->assertEquals('Test de Gramática', $exam->getName());
        $this->assertEquals('Selección', $exam->getExamType());
        $this->assertEquals('Examen', $exam->getType());
    }

    public function testExamToString(): void
    {
        $exam = new Exam('Test de Gramática', 'Selección');
        $expected = 'Examen: Test de Gramática | Selección';
        
        $this->assertEquals($expected, $exam->toString());
    }
}