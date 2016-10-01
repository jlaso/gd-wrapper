<?php

namespace JLaso\GD;

class Arc implements GeometricShapeInterface
{
    /** @var Point */
    public $center;
    /** @var int */
    public $radiusX;
    /** @var int */
    public $radiusY;
    /** @var int */
    public $start;
    /** @var int */
    public $end;

    /**
     * @param Point $center
     * @param int $radiusX
     * @param int $radiusY
     * @param int $start
     * @param int $end
     */
    public function __construct(Point $center, $radiusX, $radiusY, $start, $end)
    {
        $this->center = $center;
        $this->radiusX = $radiusX;
        $this->radiusY = $radiusY;
        $this->start = $start;
        $this->end = $end;
    }
}