<?php

namespace JLaso\GD;

class Color
{
    protected $red;
    protected $green;
    protected $blue;

    protected $value;

    /**
     * Color constructor.
     * @param $value
     */
    public function __construct($value)
    {
        if (is_string($value)) {
            $this->setHexValue($value);
        } elseif (is_array($value)) {
            $this->setRGB($value['R'], $value['G'], $value['B']);
        }
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return $this
     */
    public function setRGB($red, $green, $blue)
    {
        $this->red = $red;
        $this->blue = $blue;
        $this->green = $green;

        $this->value = dechex($red) . dechex($green) . dechex($blue);

        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function setHexValue($value)
    {
        $value = trim(trim($value, '#'));

        if (strlen($value) == 3) {
            $value = $value[0] . $value[0] . $value[1] . $value[1] . $value[2] . $value[2];
        }

        if (strlen($value) != 6) {
            throw new \Exception("To declare color in hexadecimal should be 6/3 digits long");
        }

        $this->value = $value;

        $this->red = hexdec($value[0] . $value[1]);
        $this->green = hexdec($value[2] . $value[3]);
        $this->blue = hexdec($value[4] . $value[5]);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

}