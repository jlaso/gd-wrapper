<?php

namespace JLaso\GD;

class Point
{
    public $x;
    public $y;

    /**
     * Point constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function move(Delta $delta)
    {
        $this->x += $delta->deltaX;
        $this->y += $delta->deltaY;

        return $this;
    }
}