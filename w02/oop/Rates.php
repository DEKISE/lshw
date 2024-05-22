<?php
include './Services.php';
abstract class Rates implements iRates
{
    public $distance;
    public $minutes;
    public $price;
    public function __construct($distance, $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
        $this->price = 0;
    }
    use Services;
}