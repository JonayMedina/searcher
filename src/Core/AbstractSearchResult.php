<?php
namespace App\Core;

/**
 * Clase abstracta AbstractSearchResult
 * 
 * Implementa la funcionalidad base para los resultados de búsqueda.
 * 
 * @package App\Core
 * @abstract
 */
abstract class AbstractSearchResult implements SearchResult
{
    /** @var string El nombre del recurso */
    protected string $name;

    /**
     * Constructor de AbstractSearchResult.
     * 
     * @param string $name El nombre del recurso
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getType(): string;
    abstract public function toString(): string;
}