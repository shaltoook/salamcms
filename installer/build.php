<?php
// build_installer.php

// Set a default version
$defaultVersion = "1.0.0";

// Ask for version
echo "Please enter the version [{$defaultVersion}]: ";

// Read input
$version = trim(fgets(STDIN));

// Use default if empty
if ($version === "") {
    $version = $defaultVersion;
}

echo "Using version: $version\n";

// Your build logic here...
