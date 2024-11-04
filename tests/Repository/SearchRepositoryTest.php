<?php

namespace Tests\Repository;

use App\Repository\SearchRepository;
use App\Entity\Course;
use App\Entity\Exam;
use PHPUnit\Framework\TestCase;
use PDO;
use PDOStatement;
use Mockery;

class SearchRepositoryTest extends TestCase
{
    private $pdo;
    private $repository;

    protected function setUp(): void
    {
        $this->pdo = Mockery::mock(PDO::class);
        $this->repository = new SearchRepository($this->pdo);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testSearchFindsCoursesAndExams(): void
    {
        // Mock para la consulta de cursos
        $stmtCourses = Mockery::mock(PDOStatement::class);
        $stmtCourses->shouldReceive('execute')
            ->once()
            ->with(['term' => 'ing%']);
        $stmtCourses->shouldReceive('fetch')
            ->andReturn(
                ['name' => 'Inglés Básico', 'rating' => 4.5],
                false
            );

        // Mock para la consulta de exámenes
        $stmtExams = Mockery::mock(PDOStatement::class);
        $stmtExams->shouldReceive('execute')
            ->once()
            ->with(['term' => 'ing%']);
        $stmtExams->shouldReceive('fetch')
            ->andReturn(
                ['name' => 'Test de Inglés', 'type' => 'Selección'],
                false
            );

        $this->pdo->shouldReceive('prepare')
            ->once()
            ->with(Mockery::pattern('/SELECT.*courses.*/'))->andReturn($stmtCourses);
        $this->pdo->shouldReceive('prepare')
            ->once()
            ->with(Mockery::pattern('/SELECT.*exams.*/'))->andReturn($stmtExams);

        $results = $this->repository->search('ing');

        $this->assertCount(2, $results);
        $this->assertInstanceOf(Course::class, $results[0]);
        $this->assertInstanceOf(Exam::class, $results[1]);
        $this->assertEquals('Inglés Básico', $results[0]->getName());
        $this->assertEquals('Test de Inglés', $results[1]->getName());
    }

    public function testSearchWithNoResults(): void
    {
        // Mock para la consulta de cursos
        $stmtCourses = Mockery::mock(PDOStatement::class);
        $stmtCourses->shouldReceive('execute')
            ->once()
            ->with(['term' => 'xyz%']);
        $stmtCourses->shouldReceive('fetch')
            ->andReturn(false);

        // Mock para la consulta de exámenes
        $stmtExams = Mockery::mock(PDOStatement::class);
        $stmtExams->shouldReceive('execute')
            ->once()
            ->with(['term' => 'xyz%']);
        $stmtExams->shouldReceive('fetch')
            ->andReturn(false);

        $this->pdo->shouldReceive('prepare')
            ->once()
            ->with(Mockery::pattern('/SELECT.*courses.*/'))->andReturn($stmtCourses);
        $this->pdo->shouldReceive('prepare')
            ->once()
            ->with(Mockery::pattern('/SELECT.*exams.*/'))->andReturn($stmtExams);

        $results = $this->repository->search('xyz');

        $this->assertEmpty($results);
    }
}