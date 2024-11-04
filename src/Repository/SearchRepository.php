<?php
namespace App\Repository;

use App\Core\SearchResult;
use App\Entity\Course;
use App\Entity\Exam;
use PDO;

class SearchRepository
{
    /** @var PDO La conexión a la base de datos */
    private PDO $connection;

    /**
     * Constructor de SearchRepository.
     * 
     * @param PDO $connection La conexión a la base de datos
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Busca recursos que coincidan con el término de búsqueda
     * @param string $searchTerm
     * @return SearchResult[]
     */
    public function search(string $searchTerm): array
    {
        $results = [];
        
        // Buscar clases
        $stmt = $this->connection->prepare(
            "SELECT name, rating FROM courses WHERE name LIKE :term"
        );
        $term = $searchTerm . '%';
        $stmt->execute(['term' => $term]);
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = new Course($row['name'], $row['rating']);
        }

        // Buscar exámenes
        $stmt = $this->connection->prepare(
            "SELECT name, type FROM exams WHERE name LIKE :term"
        );
        $stmt->execute(['term' => $term]);
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = new Exam($row['name'], $row['type']);
        }

        return $results;
    }
}