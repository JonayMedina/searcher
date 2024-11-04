<?php

namespace App\Entity;

use App\Core\AbstractSearchResult;

class Course extends AbstractSearchResult
{
    /** @var float La calificación de la clase (0-5) */
    private float $rating;

    /**
     * Constructor de Course.
     * 
     * @param string $name   El nombre de la clase
     * @param float  $rating La calificación de la clase (0-5)
     */
    public function __construct(string $name, float $rating)
    {
        parent::__construct($name);
        $this->rating = $rating;
    }

    /**
     * Obtiene la calificación de la clase.
     * 
     * @return float La calificación en escala de 0 a 5
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    public function getType(): string
    {
        return 'Clase';
    }

    public function toString(): string
    {
        return sprintf("%s: %s | %.1f/5", $this->getType(), $this->name, $this->rating);
    }
}