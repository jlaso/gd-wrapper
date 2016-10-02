<?php

include __DIR__ . '/vendor/autoload.php';

use JLaso\GD\Image;
use JLaso\GD\Color;
use JLaso\GD\Palette;

$image = new Image(800, 600);
$palette = new Palette(0);

// draw an eye
$image
    // define colours
    ->createColor('black', new Color(['R' => 0, 'G' => 0, 'B' => 0]))
    ->createColor('white', new Color(['R' => 255, 'G' => 255, 'B' => 255]))
    ->createColors($palette->getColors(5))
    // start drawing
    ->setColor('black')
    ->fill()
    ->setColor('base')
    ->fill($image->factory(Image::RECTANGLE, [200,90], [600,472]))
    ->setColor('1st-comp')
    ->fill($image->factory(Image::POLYGON, [
        400,100,
        210,238,
        282,462,
        518,462,
        590,238,
    ]))
    ->setColor('2nd-comp')
    ->fill($image->factory(Image::CIRCLE, [200,200], 200))
    ->setColor('3rd-comp')
    ->fill($image->factory(Image::ELLIPSE, [600,400], 200, 100))
    ->setColor('4th-comp')
    ->fill($image->factory(Image::RECTANGLE, [550,100], [700,200]))
    ->setColor('white')
    ->fill($image->factory(Image::ARC_PIE, [200,400], 180,180, 10,170))
    // save to a file
    ->saveAsPng('/tmp/palette.png')
;