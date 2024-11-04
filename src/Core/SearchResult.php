<?php
// src/Core/SearchResult.php
namespace App\Core;

/**
 * Interface SearchResult
 * 
 * Define el contrato para los resultados de búsqueda en el sistema
 * de la escuela de idiomas.
 * 
 * @package App\Core
 */

interface SearchResult
{
    /**
     * Obtiene el nombre del recurso
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Obtiene el tipo de recurso (Clase o Examen)
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Convierte el resultado a string formateado
     *
     * @return string
     */
    public function toString(): string;
}