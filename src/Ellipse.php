<?php

namespace JLaso\GD;

class Ellipse implements GeometricShapeInterface
{
    /** @var Point */
    public $center;
    /** @var int */
    public $radiusX;
    /** @var int */
    public $radiusY;

    /**
     * @param Point $center
     * @param int $radiusX
     * @param int $radiusY
     */
    public function __construct(Point $center, $radiusX, $radiusY)
    {
        $this->center = $center;
        $this->radiusX = $radiusX;
        $this->radiusY = $radiusY;
    }
}