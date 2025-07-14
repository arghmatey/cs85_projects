<?php
namespace App\Models;

class SewingProject {
    public $name;
    public $fabric;
    public $hoursSpent;
    public $hasPattern;
    public $status;

    public function __construct($name, $fabric, $hoursSpent, $hasPattern, $status) {
        $this->name = $name;
        $this->fabric = $fabric;
        $this->hoursSpent = $hoursSpent;
        $this->hasPattern = $hasPattern;
        $this->status = $status;
    }

    public function getSummary() {
        return "{$this->name} uses {$this->fabric} and is currently {$this->status}.";
    }
}