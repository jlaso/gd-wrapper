<?php

namespace JLaso\GD;

class Circle implements GeometricShapeInterface
{
    /** @var Point */
    public $center;
    /** @var int */
    public $radius;

    /**
     * @param Point $center
     * @param int $radius
     */
    public function __construct(Point $center, $radius)
    {
        $this->center = $center;
        $this->radius = $radius;
    }
}