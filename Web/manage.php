<?php
$start = microtime(true);
require '../Library/autoload.php';
require '../Library/PHPMailer/class.phpmailer.php';
$app = new Applications\Manage\ManageApplication($start);
$app->run();