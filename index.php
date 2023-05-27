<?php

class Box {
    public function __construct($num, $color)
    {
        echo "object was created\n";
    }

    public function __get($name) {
        echo "$name is accessed\n";
        return 'hello';
    }

    public function __set($name, $value) {
        echo "$name is given value $value\n";
    }

    public function __call($name, $params) {
        echo "$name is called with \n";
        var_dump($params);
    }

    public function __invoke(...$params) {
        echo "object is used like a function\n";
        var_dump($params);
    }

    public function __destruct()
    {
        echo "object was destroyed\n";
    }

    public function __toString() {
        return "bla bla to string\n";
    }
}

$box1 = new Box(1, 'color');
echo $box1->color;
$box1->material = 'metal';
$box1->nothing(1, 'hello');
$box1(1, 'hello');
$box = 1;
$box2 = new Box(2, 'dfdf');
echo $box1;