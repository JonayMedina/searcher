<?php
namespace App\Service;

use App\Repository\SearchRepository;

class SearchService
{
    /** @var SearchRepository El repositorio de búsqueda */
    private SearchRepository $repository;

    /**
     * Constructor de SearchService.
     * 
     * @param SearchRepository $repository El repositorio de búsqueda
     */
    public function __construct(SearchRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Ejecuta la búsqueda y devuelve los resultados formateados
     *
     * @param string $searchTerm
     * @return array
     */
    public function search(string $searchTerm): array
    {
        if (strlen($searchTerm) < 3) {
            throw new \InvalidArgumentException(
                'El término de búsqueda debe tener al menos 3 caracteres'
            );
        }

        $results = $this->repository->search($searchTerm);
        return array_map(fn($result) => $result->toString(), $results);
    }
}