<?php

$packageRoot = realpath(__DIR__ . "/../");

require_once $packageRoot . "/vendor/autoload.php";

if (!isset($_SERVER["DOCUMENT_ROOT"]) || !$_SERVER["DOCUMENT_ROOT"]) {
    $_SERVER["DOCUMENT_ROOT"] = $packageRoot;
}