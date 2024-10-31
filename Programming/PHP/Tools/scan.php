<?php

$directory = 'application/modules'; // Change this to your modules directory

function scanControllers($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $filePath = $dir . '/' . $file;

        if (is_dir($filePath)) {
            // Check if it's a controllers directory
            if (strpos($filePath, '/controllers') !== false) {
                // Check for PHP files in this directory
                foreach (scandir($filePath) as $controllerFile) {
                    if ($controllerFile === '.' || $controllerFile === '..') continue;
                    if (pathinfo($controllerFile, PATHINFO_EXTENSION) === 'php') {
                        $controllerFilePath = $filePath . '/' . $controllerFile;
                        $contents = file_get_contents($controllerFilePath);
                        if (strpos($contents, "require_once('vendors/autoload.php');") !== false) {
                            // Output the file path that needs to be changed
                            echo "Found in: $controllerFilePath\n";
                        }
                    }
                }
            } else {
                scanControllers($filePath); // Recursively scan directories
            }
        }
    }
}

scanControllers($directory);
