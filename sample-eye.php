<?php

include __DIR__ . '/vendor/autoload.php';

use JLaso\GD\Image;
use JLaso\GD\Color;
use JLaso\GD\Point;

$image = new Image(800, 600);

// draw an eye
$image
    // define colours
    ->createColor('black', new Color(['R' => 0, 'G' => 0, 'B' => 0]))
    ->createColor('white', new Color(['R' => 255, 'G' => 255, 'B' => 255]))
    // define some positions
    ->createPosition('center', new Point(400,300))
    // start drawing
    ->setColor('black')
    ->fill()
    ->setColor('white')
    ->fill($image->factory(Image::ELLIPSE, 'center', 200, 150))
    ->setColor('black')
    ->fill($image->factory(Image::CIRCLE, 'center', 100))
    ->setColor('white')
    ->fill($image->factory(Image::CIRCLE, 'center', 30))
    // save to a file
    ->saveAsPng('/tmp/eye.png')
;