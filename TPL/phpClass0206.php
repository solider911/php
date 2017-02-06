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
echo "<br>";


// php 数组
$paper['cook'] = "cooki";
$paper['osdf'] = "Inject";
$paper['sad'] = "loser";

// <pre> 不忽略由制表符和换行符产生的空格
echo "<pre>";

    foreach($paper as $item=>$value)
        echo "$item: \t$value<br>";

echo "</pre>";

echo "<br>";

echo (is_array($fred) ? "is array" : "is not array");

echo "<br>";


// php 对象

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
