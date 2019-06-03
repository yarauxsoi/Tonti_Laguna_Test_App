<?php

require 'Canvas.php';

$width = htmlspecialchars($_GET['width']);
$height = htmlspecialchars($_GET['height']);
$quantity = htmlspecialchars($_GET['quantity']);
$radius = htmlspecialchars($_GET['radius']);
$allow_intersection = isset($_GET['intersection']);

$canvas = new Canvas($width, $height);
$canvas->drawABunchOfCircles($quantity, $radius, $allow_intersection);
$canvas->saveAsPng();