<?php
header("content-type: text/plain");

$text1 = 'Привет, ';
$text2 = 'Мир!';
$result = $text1 . $text2;
echo $result . PHP_EOL;

$a = 10;
$b = 2;
$c = 5;
$result = $a + $b + $c;
echo $result . PHP_EOL;

$str = 'http://site.ru';
preg_match('/^http(|s):\/\//', $str, $result);
if (!empty($result)) {
    echo 'да' . PHP_EOL;
} else {
    echo 'нет' . PHP_EOL;
}

$array = ['html', 'css', 'php'];
$result = implode(',', $array);
echo $result . PHP_EOL;

$str = '15678454525';
preg_match('/^[1-9]{1,12}$/', $str, $result);
if (!empty($result)) {
    echo 'да' . PHP_EOL;
} else {
    echo 'нет' . PHP_EOL;
}

$str = 'aaa * bbb ** eee *** kkk ****';
$str = preg_replace('/(?<=[^*])\*\*(?=[^*])/', '!', $str);
echo $str . PHP_EOL;