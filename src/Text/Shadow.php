<?php

namespace JLaso\GD\Text;

class Shadow
{
    /** @var double offset expresses percentage */
    public $offset;
    /** @var string */
    public $color;

    /**
     * @param double $offset
     * @param string $color
     */
    public function __construct($offset, $color)
    {
        $this->offset = $offset;
        $this->color = $color;
    }
}
