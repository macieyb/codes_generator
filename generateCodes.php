<?php

require __DIR__ . '/vendor/autoload.php';

use CodeGenerator\CliRequestHandler;
use CodeGenerator\PostRequestHandler;

if (defined('STDIN')) {
    $arguments = getopt("", ['numberOfCodes:', 'lengthOfCode:', 'file:']);
    $requestHandler = new CliRequestHandler($arguments);
    $requestHandler->createCodes();
} elseif (count($_POST) != 0 && $_POST['submit']) {
    $requestHandler = new PostRequestHandler($_POST);
    $filePath = $requestHandler->createCodes();
    header("Location: index.php?filepath={$filePath}");
} else {
    header('Location: index.php');
}