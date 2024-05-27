<?php

/*Тариф базовый
Цена за 1 км = 10 рублей
Цена за 1 минуту = 3 рубля*/

class Rate1 extends Rates
{
    public function Price()
    {
        $price = $this->distance * 10 + $this->minutes * 3 + $this->price;
        echo $price . " руб." . PHP_EOL;
    }
}
