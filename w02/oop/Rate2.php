<?php

/*Тариф почасовой
Цена за 1 км = 0
Цена за 60 минут = 200 рублей
Округление до 60 минут в большую сторону*/

class Rate2 extends Rates
{
    public function Price()
    {
        $price = $this->distance * 0 + ceil($this->minutes / 60) * 200 + $this->price;
        echo $price . " руб." . PHP_EOL;
    }
}
