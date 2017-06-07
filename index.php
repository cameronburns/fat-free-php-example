<?php
// Get Fat-Free
require_once("lib/base.php");

// Configure/run Fat-Free
$f3 = Base::instance();

// Configure config/URL routes
$f3->config('config.ini');

// Start session & run!
new Session();
$f3->run();

?>