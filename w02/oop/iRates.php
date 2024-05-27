<?php

interface iRates
{
    public function __construct($distance, $time);
    public function Price();
    public function addServices();
}
