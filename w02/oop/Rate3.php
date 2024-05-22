<?php

/*Тариф студенческий
Цена за 1 км = 4 рубля
Цена за 1 минуту = 1 рубль*/

class Rate3 extends Rates
{
    public function Price()
    {
        $price = $this->distance * 4 + $this->minutes * 1 + $this->price;
        echo $price . " руб." . PHP_EOL;
    }
}
