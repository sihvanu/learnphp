<?php

class Job {
    private $logger;
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }
    public function task(){        
        for ($i=0;$i<10;$i++){
            $this->logger->log($i);
        }
    }
}

interface Logger {
    public function log($message);
}

class ConsoleLogger implements Logger {
    public function log($message){
        echo $message . "\n";
    }
}











class NothingLogger implements Logger{
    public function log($message){
        
    }
}


$logger = new ConsoleLogger();
$job = new Job($logger);
$job->task();