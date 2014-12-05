<?php
$start = microtime(true);
require '../Library/autoload.php';
require '../Library/PHPMailer/class.phpmailer.php';
$app = new Applications\Admin\AdminApplication($start);
$app->run();