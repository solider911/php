<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/6
 * Time: 11:57
 */

$user = new User();
print_r($user);
echo "<br>";

$user->user = "cxxxxxx";
$user->password = "xsadfsadf";
print_r($user);
echo "<br>";

$user->save_user();
echo "<br>";


Translate::lookup();
echo "<br>";

$translate = new Translate();
$translate->lookup2();


class User{
    public $user, $password;
    function save_user(){
        echo "Save User code here";
    }
}

class Translate{
    const ENGLISH = 0;
    const FRENCH  = 1;

    static function lookup(){
        echo self::FRENCH;
    }

    function lookup2(){
        echo self::FRENCH;
    }
}
