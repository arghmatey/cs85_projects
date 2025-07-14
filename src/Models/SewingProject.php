<?php
namespace App\Models;

class SewingProject {
    public $name;
    public $hoursSpent;
    public $fabric;
    public $status;
    public $hasPattern;

    public function __construct($name, $hoursSpent, $fabric, $status, $hasPattern) {
        $this->name = $name;
        $this->hoursSpent = $hoursSpent;
        $this->fabric = $fabric;
        $this->status = $status;
        $this->hasPattern = $hasPattern;
    }

    public function getSummary() {
        return "{$this->name} uses {$this->fabric} and is currently {$this->status}.";
    }
}