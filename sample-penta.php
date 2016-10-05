<?php

include __DIR__ . '/vendor/autoload.php';

use JLaso\GD\Image;
use JLaso\GD\Color;

$image = new Image(800, 600);

// draw an eye
$image
    // define colours
    ->createColor('black', new Color(['R' => 0, 'G' => 0, 'B' => 0]), 60)
    ->createColor('white', new Color(['R' => 255, 'G' => 255, 'B' => 255]))
    ->createColor('red', new Color(['R' => 255, 'G' => 0, 'B' => 0]), 60)
    // start drawing
    ->setColor('black')
    ->fill()
    ->setColor('white')
    ->fill($image->factory(Image::RECTANGLE, [200,90], [600,472]))
    ->setColor('red')
    ->fill($image->factory(Image::POLYGON, [
        // http://www.mathopenref.com/coordpolycalc.html
        400,100,
        210,238,
        282,462,
        518,462,
        590,238,
    ]))
    // save to a file
    ->saveAsPng('/tmp/penta.png')
;