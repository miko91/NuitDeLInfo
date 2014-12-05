<?php
$start = microtime(true);
require '../Library/autoload.php';
require '../Library/PHPMailer/class.phpmailer.php';
$app = new Applications\Frontend\FrontendApplication($start);
$app->run();