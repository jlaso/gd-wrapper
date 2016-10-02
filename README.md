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



