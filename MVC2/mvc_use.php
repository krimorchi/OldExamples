<?php
spl_autoload_register();

//use Controllers\Controller;

$obj = new Controllers\Controller('users/.html');
echo $obj->render();