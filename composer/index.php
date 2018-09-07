<?php
require_once 'app/start.php';

$user  = new User();
$user2 = new Usertwo();
$user3 = new Userthree();

$ctl   = new App\Controllers\Ctl();
$ctl2  = new App\Controllers\Controllerstwo\Ctltwo();
$ctl3  = new App\Controllers\Controllerstwo\Ctlthree();
