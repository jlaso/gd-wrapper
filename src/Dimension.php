<?php

namespace JLaso\GD;

class Dimension
{
    public $width;
    public $height;

    /**
     * Dimension constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public static function calcDimension(Point $p1, Point $p2)
    {
        return new Dimension(abs($p1->x - $p2->x), abs($p1->y - $p2->y));
    }
}