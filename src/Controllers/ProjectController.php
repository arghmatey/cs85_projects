<?php
namespace App\Controllers;

use App\Models\SewingProject;

class ProjectController {
    public function show() {
        $project = new SewingProject("Wrap Skirt", "Rayon", 3, true, "complete");

        include __DIR__ . '/../../views/porjectview.php';
    }
}