<?php

class Canvas {
  protected $width;
  protected $height;
  protected $resource_id;
  protected $circle_centers = [];
  protected $colors = [
    ['r' => 0, 'g' => 0, 'b' => 0],
    ['r' => 255, 'g' => 0, 'b' => 0],
    ['r' => 0, 'g' => 255, 'b' => 0],
    ['r' => 0, 'g' => 0, 'b' => 255],
    ['r' => 255, 'g' => 255, 'b' => 0],
  ];

  public function __construct($width, $height) {
    $this->width = $width;
    $this->height = $height;
    $this->resource_id = imagecreate($width, $height);
    $this->background = imagecolorallocate($this->resource_id, 255, 255, 255);
    
  }

  public function saveAsPng() {
    header("Content-type: image/png");
    imagepng($this->resource_id);
    imagedestroy($this->resource_id);
  }

  public function drawABunchOfCircles($quantity, $radius, $allow_intersection) {
    for ($i = 0; $i < $quantity; ++$i) {
      $x = rand(0 + $radius / 2, $this->width - $radius / 2);
      $y = rand(0 + $radius / 2, $this->height - $radius / 2);
      $color = $this->getRandomColor();
      if ($this->checkIntersection($x, $y, $radius, $allow_intersection)) continue;
      $this->drawCircle($radius, $x, $y, $color);
      array_push($this->circle_centers, [$x, $y]);
    }
  }
  
  protected function drawCircle($radius, $x_position, $y_position, $color) {
    imagefilledellipse($this->resource_id, $x_position, $y_position, $radius, $radius, $color);
  }

  protected function getRandomColor() {
    $color = $this->colors[rand(0, count($this->colors) - 1)];
    return imagecolorallocate($this->resource_id, $color['r'], $color['g'], $color['b']);
  }

  protected function checkIntersection($x_position, $y_position, $radius, $allow_intersection) {
    if ($allow_intersection) return;

    foreach ($this->circle_centers as $circle_center) {
      $x = $circle_center[0];
      $y = $circle_center[1];
      $distSq = ($x - $x_position) * ($x - $x_position) + ($y - $y_position) * ($y - $y_position);
      $radSumSq = pow(2 * $radius, 2);
      if ($distSq < $radSumSq) {
        return true;
      }
    }
  }
}