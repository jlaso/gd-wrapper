<?php

include __DIR__ . '/vendor/autoload.php';

use JLaso\GD\Image;
use JLaso\GD\Color;
use JLaso\GD\Point;
use JLaso\GD\Text\Shadow;
use JLaso\GD\Text\FontRepository;

const TEXT_SHADOW = true;

$fontRepository = new FontRepository(['/Library/Fonts']);

$image = new Image($w = 800, $h = 600);
$image->setFontRepository($fontRepository);

// height of the text block
$hText = 100;
$leftCenter = new Point(0,($h - $hText)/2);
$shadow = TEXT_SHADOW ? new Shadow(0.06, 'gray') : null;

// draw an eye
$image
    // define colours
    ->createColor('black', new Color('000'))
    ->createColor('gray', new Color('aaa'))
    ->createColor('white', new Color('fff'))
    // define some positions
    ->createPosition('left-center', $leftCenter)
    // start writing
    ->setColor('black')
    ->fill()
    // wrap the text in a white box to improve visibility
    ->setColor('white')
    ->fill($image->factory(Image::RECTANGLE, 'left-center', $leftCenter->cloneAndMove($w,$hText)))
    // write text
    ->setFont('Arial')
    ->moveTo('left-center')
    ->setColor('black')
    ->writeText($w, $hText, 'This is a test', $shadow, [10,10])
    // save to a file
    ->saveAsPng('/tmp/text.png')
;