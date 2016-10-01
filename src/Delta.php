<?php

namespace JLaso\GD;

class Delta implements GeometricObjectInterface
{
    public $deltaX;
    public $deltaY;

    /**
     * Delta constructor.
     * @param $deltaX
     * @param $deltaY
     */
    public function __construct($deltaX, $deltaY)
    {
        $this->deltaX = $deltaX;
        $this->deltaY = $deltaY;
    }

    public static function calcDelta(Point $fromPoint, Point $toPoint)
    {
        return new Delta(abs($toPoint->x - $fromPoint->x), abs($toPoint->y - $fromPoint->y));
    }
}