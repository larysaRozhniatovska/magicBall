<?php

include_once 'app' . DIRECTORY_SEPARATOR . 'bootstrap.php';

$controllers = Controllers::getInstance();
$controllers->proc();