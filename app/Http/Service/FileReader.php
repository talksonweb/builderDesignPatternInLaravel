<?php

namespace App\Http\Service;

class FileReader 
{
    private static $instance;
    private $tasks = [];

    private function __construct() {}

    private function __clone() {}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function setTask($task)
    {
        $this->tasks[] = $task;
    }

    public function getTask()
    {
        foreach ($this->tasks as $key => $task) {
            echo $task . '<br />';
        }
    }
}

