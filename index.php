<?php

trait SomeLogic {
    public $prop;

    public function method(){
        echo $this->prop;
    }
}

trait SomeLogic2 {
    public $prop;

    public function method(){
        echo $this->prop2;
    }
}

class Something {
    use SomeLogic;
}

class SomethingElse {
    use SomeLogic;
}

$obj = new Something();
$obj->method();
$obj->method2();