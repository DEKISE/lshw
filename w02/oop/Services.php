<?php
trait Services
{
    public function addServices($driver = false, $gps = false)
    {
        if ($driver)
        {
            $this->price += 100;
        }

        if ($gps)
        {
            $hours = ceil($this->minutes / 60);
            $this->price += $hours * 15;
        }
    }
}
