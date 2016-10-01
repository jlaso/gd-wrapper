<?php

namespace JLaso\GD;

class Polygon implements GeometricShapeInterface
{
    /** @var Point[] */
    protected $points;

    public function __construct(array $points)
    {
        while(count($points)) {
            $x = array_shift($points);
            $y = array_shift($points);
            $this->points[] = new Point($x, $y);
        }
    }

    public function asRawArray()
    {
        $result = [];
        foreach($this->points as $point)
        {
            $result[] = $point->x;
            $result[] = $point->y;
        }

        return $result;
    }

    public function vertexNum()
    {
        return count($this->points);
    }
}