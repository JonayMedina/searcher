<?php

namespace Tests\Service;

use App\Service\SearchService;
use App\Repository\SearchRepository;
use App\Entity\Course;
use App\Entity\Exam;
use PHPUnit\Framework\TestCase;
use Mockery;
use InvalidArgumentException;

class SearchServiceTest extends TestCase
{
    private $repository;
    private $service;

    protected function setUp(): void
    {
        $this->repository = Mockery::mock(SearchRepository::class);
        $this->service = new SearchService($this->repository);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testSearchWithValidTerm(): void
    {
        $searchResults = [
            new Course('Inglés Básico', 4.5),
            new Exam('Test de Inglés', 'Selección')
        ];

        $this->repository->shouldReceive('search')
            ->once()
            ->with('ing')
            ->andReturn($searchResults);

        $results = $this->service->search('ing');

        $this->assertCount(2, $results);
        $this->assertEquals('Clase: Inglés Básico | 4.5/5', $results[0]);
        $this->assertEquals('Examen: Test de Inglés | Selección', $results[1]);
    }

    public function testSearchWithShortTerm(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->service->search('in');
    }

    public function testSearchWithEmptyResults(): void
    {
        $this->repository->shouldReceive('search')
            ->once()
            ->with('xyz')
            ->andReturn([]);

        $results = $this->service->search('xyz');

        $this->assertEmpty($results);
    }
}