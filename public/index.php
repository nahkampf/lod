<?php
require "vendor/autoload.php";
use Jenssegers\Blade\Blade;
$blade = new Blade('views', 'cache');
echo $blade->render('page', ['title' => 'Land of Desolation', 'content' => 'tutitititit']);