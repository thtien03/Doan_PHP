<?php

class RandomID
{
    public static function randomID()
    {
        $length = 10;
        $getTime = date('dmYHis') . gettimeofday()['usec'];
        $radom = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        $id = $getTime . "" . $radom;
        return $id;
    }
}
