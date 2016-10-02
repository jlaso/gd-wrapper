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
            if(isset($value['R'])) {
                $this->setRGB($value['R'], $value['G'], $value['B']);
            }else if(isset($value['H'])){
                $this->setHsl($value['H'], $value['S'], $value['L']);
            }
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
     * @return array
     */
    public function getRGB()
    {
        return [
            'R' => $this->red,
            'G' => $this->green,
            'B' => $this->blue,
        ];
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

    public function getHsl()
    {
        $red = ($this->red / 255);
        $green = ($this->green / 255);
        $blue = ($this->blue / 255);

        $min = min($red, $green, $blue);
        $max = max($red, $green, $blue);
        $delta = $max - $min;

        $lightness = ($max + $min) / 2;

        if (0 === $delta) {

            $hue = 0;
            $saturation = 0;

        } else {

            if ($lightness < 0.5) {
                $saturation = $delta / ($max + $min);
            } else {
                $saturation = $delta / (2 - $max - $min);
            }

            $deltaRed = ((($max - $red) / 6) + ($delta / 2)) / $delta;
            $deltaGreen = ((($max - $green) / 6) + ($delta / 2)) / $delta;
            $deltaBlue = ((($max - $blue) / 6) + ($delta / 2)) / $delta;

            if ($red == $max) {
                $hue = $deltaBlue - $deltaGreen;
            } else if ($green == $max) {
                $hue = 1 / 3 + $deltaRed - $deltaBlue;
            } else {  // ($blue == $max)
                $hue = 2 / 3 + $deltaGreen - $deltaRed;
            }

            if ($hue < 0) {
                $hue++;
            }
            if ($hue > 1) {
                $hue--;
            }
        }

        return [
            'H' => $hue * 360,
            'S' => $saturation,
            'L' => $lightness,
        ];
    }

    /**
     * https://github.com/mexitek/phpColors
     * @param int $hue
     * @param int $saturation
     * @param int $lightness
     * @return $this
     */
    public function setHsl($hue, $saturation, $lightness)
    {
        $hue = $hue / 360;

        if ($saturation == 0) {

            $red = $lightness * 255;
            $green = $lightness * 255;
            $blue = $lightness * 255;

        } else {

            if ($lightness < 0.5) {
                $aux = $lightness * (1 + $saturation);
            } else {
                $aux = ($lightness + $saturation) - ($saturation * $lightness);
            }

            $tmp = 2 * $lightness - $aux;

            $red = round(255 * $this->hueToRgb($tmp, $aux, $hue + (1 / 3)));
            $green = round(255 * $this->hueToRgb($tmp, $aux, $hue));
            $blue = round(255 * $this->hueToRgb($tmp, $aux, $hue - (1 / 3)));

        }

        $this->setRGB($red, $green, $blue);

        return $this;
    }

    /**
     * https://github.com/mexitek/phpColors
     * @param int $v1
     * @param int $v2
     * @param int $vH
     * @return double
     */
    private function hueToRgb($v1, $v2, $vH)
    {
        if ($vH < 0) {
            $vH += 1;
        }

        if ($vH > 1) {
            $vH -= 1;
        }

        if ((6 * $vH) < 1) {
            return ($v1 + ($v2 - $v1) * 6 * $vH);
        }

        if ((2 * $vH) < 1) {
            return $v2;
        }

        if ((3 * $vH) < 2) {
            return ($v1 + ($v2 - $v1) * ((2 / 3) - $vH) * 6);
        }

        return $v1;
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