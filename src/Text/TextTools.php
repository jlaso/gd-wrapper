<?php

namespace JLaso\GD\Text;

class TextTools
{
    /**
     * @param string $text
     * @param int $width
     * @param int $height
     * @param string $ttf
     * @param int[] $padding
     * @param int $angle
     * @return \stdClass
     * @throws \Exception
     */
    public static function encloseText($text, $width, $height, $ttf, array $padding =[], $angle = 0)
    {
        // normalize $padding   see http://www.w3schools.com/cssref/pr_padding.asp
        if(count($padding) === 0) $padding = [0,0,0,0];
        if(count($padding) === 1) $padding = [$padding, $padding, $padding, $padding];
        if(count($padding) === 2) $padding = [$padding[0], $padding[1], $padding[0], $padding[1]];
        if(count($padding) === 3) $padding = [$padding[0], $padding[1], $padding[2], $padding[1]];
        if(count($padding) != 4) throw new \Exception('Padding has a bad format');
        list($paddingTop, $paddingRight, $paddingBottom, $paddingLeft) = $padding;

        // figure the longest text out
        if(is_array($text)){
            $helper = [];
            foreach($text as $row){
                list($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4) = imagettfbbox(10, $angle, $ttf, $row);
                $distance = intval(round(sqrt(($x4-$x2)^2 + ($y4-$y2)^2)));
                $helper[$distance] = $row;
            }
            ksort($helper);
            $longText = array_pop($helper);
            $height = intval($height/count($text));
        }else{
            $longText = $text;
        }
        $effectiveWidth = $width - $paddingLeft - $paddingRight;
        $effectiveHeight = $height - $paddingBottom - $paddingTop;

        // figure fits text size out
        $size = 300;
        do{
            $okay = true;
            // http://php.net/manual/en/function.imagettfbbox.php#refsect1-function.imagettfbbox-returnvalues
            list($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4) = imagettfbbox($size, $angle, $ttf, $longText);
            $textWidth = max($x1,$x2,$x3,$x3) - min($x1,$x2,$x3,$x3);
            $textHeight = max($y1,$y2,$y3,$y4) - min($y1,$y2,$y3,$y4);
            if($textHeight > $effectiveHeight || $textWidth > $effectiveWidth) {
                $size -= 10;
                $okay = false;
            }
        }while(!$okay && $size>10);

        $result = new \stdClass();
        $result->fontSize = $size;
        $result->textHeight = $textHeight;
        $result->textWidth = $textWidth;
        $result->paddings = $padding;

        return $result;
    }
}