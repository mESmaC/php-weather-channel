<?php

require 'vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

$sassFolder = 'sass/';
$cssFolder = 'css/';

$compiler = new Compiler();
$compiler->setImportPaths($sassFolder);  // Add this line

$sassFiles = glob($sassFolder . '*.scss');

foreach ($sassFiles as $sassFile) {
    if (basename($sassFile)[0] !== '_') {  // Skip partials
        $fileName = basename($sassFile, '.scss');
        $cssFile = $cssFolder . $fileName . '.css';
        
        $scss = file_get_contents($sassFile);
        $css = $compiler->compileString($scss)->getCss();
        
        file_put_contents($cssFile, $css);
        
        echo "Compiled $sassFile to $cssFile\n";
    }
}