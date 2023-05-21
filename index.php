<?php

class Box {
    private $width;
    protected $height;
    public $length;
    public $color;
    public $material;
    static $count;

    static function something(){
        echo self::$count;
    }
    

    public function open() {
        var_dump($this->width);
        echo 'box is open' . self::$count;
    }

    public function close() {
        echo "box is closed";
        }
    }

$box1 = new Box();
Box::$count = 1;
var_dump($box->length);
$box1 -> length = 10;
$box1 -> color = 'red';
$box1 -> material = 'wood';
var_dump($box1);
$box1 -> open();

$box2 = new Box();
$box1::$count = 2;
$box2 -> length = 30;
$box2 -> color = 'green';
$box2 -> material = 'metal';
var_dump($box2);
$box2 -> open();

class MetalBox extends Box {
    public $material = 'metal';
    public $conductivity;

    public function electrify(){
        $this->height = 10;
        var_dump($this->width);
        echo 'wuush';
    }

    public function open() {
        echo "something else opened";
    }

    public function setWidth($width) {
        if($width > 0){
            $this->width = $width;
        }
    }
    public function getWidth(){
        return $this->width;
    }
}

var_dump($box->length)<
$box3 = new MetalBox();
$box3->electrify();
$box3->open();
Box::$count = 3;
var_dump($box3);

var_dump($box1::$count);
var_dump($box2::$count);
var_dump($box3::$count);
Box::something();