<?php

namespace Tests\Entity;

use App\Entity\Course;
use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    public function testCourseCreation(): void
    {
        $course = new Course('Inglés Básico', 4.5);
        
        $this->assertEquals('Inglés Básico', $course->getName());
        $this->assertEquals(4.5, $course->getRating());
        $this->assertEquals('Clase', $course->getType());
    }

    public function testCourseToString(): void
    {
        $course = new Course('Inglés Básico', 4.5);
        $expected = 'Clase: Inglés Básico | 4.5/5';
        
        $this->assertEquals($expected, $course->toString());
    }
}