<?php

require_once('./model/patient.class.php');
require __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->setConfigDir('./smarty/configs');

?> 