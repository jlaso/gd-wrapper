# image

image wrapper for PHP GD image

I created this package with the only intention to write compact and understandable scripts.

The idea is to use this:

```
$image = new Image(800, 600);

$image
    ->createColor('black', new Color(['R' => 0, 'G' => 0, 'B' => 0]))
    ->createColor('white', new Color(['R' => 255, 'G' => 255, 'B' => 255]))
    ->setColor('black')
    ->fill()
    ->setColor('white')
    ->fill(new Ellipse(new Point(400, 300), 200, 150))
    ->setColor('black')
    ->fill(new Circle(new Point(400, 300), 100))
    ->setColor('white')
    ->fill(new Circle(new Point(400, 300), 30))
    ->saveAsPng('/tmp/eye.png');
```

Instead of this:

```
$image = imagecreate(800, 600);

$black = imagecolorallocate($image, 0, 0, 0); 
$white = imagecolorallocate($image, 255, 255, 255);
 
imagefill($image, 0, 0, $black);
 
imagefilledellipse($image, 400, 300, 200, 150, $white);
imagefilledellipse($image, 400, 300, 100, 100, $black);
imagefilledellipse($image, 400, 300, 30, 30, $white);

imagepng($image, '/tmp/eye.png');
```

Example to write ellipses and circles:

```
php sample-eye.php && open /tmp/eye.png
```

![Eye example](/doc/eye.png)

Example to write polygons:

```
php sample-penta.php && open /tmp/penta.png
```

![Polygon example](/doc/penta.png)

Example to write text: take a look over sample-text.php

```
php sample-text.php && open /tmp/text.png
```

![Text example](/doc/text.png)

Example to use palette:

```
php sample-palette.php && open /tmp/palette.png
```

![Palette example](/doc/palette.png)

Internal palettes had been imported from [Jam3/nice-color-palettes](https://github.com/Jam3/nice-color-palettes)

![200 palettes](https://camo.githubusercontent.com/d21f9ee0b3a4ba5dc5fe9b02a3cedb9da686cd3b/68747470733a2f2f692e696d6775722e636f6d2f5859594d3471702e706e67)


[How to edit this file](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)


