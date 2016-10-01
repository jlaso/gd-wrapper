<?php

namespace JLaso\GD;

class Rectangle implements GeometricShapeInterface
{
    /** @var Point */
    public $point1;
    /** @var Point */
    public $point2;

    /**
     * @param Point $point1
     * @param Point $point2
     */
    public function __construct(Point $point1, Point $point2)
    {
        $this->point1 = $point1;
        $this->point2 = $point2;
    }
}