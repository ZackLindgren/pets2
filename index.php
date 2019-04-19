<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3 ->route('GET /', function()
{
    echo '<h1>My Pets</h1>';
    echo '<a href="order">Order a Pet</a>';
});

//define a route

$f3 ->route('GET /@animal', function($f3,$params)
{
    $animal= $params ['animal'];

    switch($animal)
    {
        case 'dog':
            echo "<h3> Woof!!</h3>";
            break;

        case 'chicken':
            echo "<h3> Cluck!</h3>";
            break;

        case 'cat':
            echo "<h3> Meow!</h3>";
            break;


        case 'snake':
            echo "<h3> Hiss!!</h3>";
            break;


        case 'pig':
            echo "<h3>Oink!</h3>";
            break;
        default:
            $f3->error(404);

    }

});


//Run fat free
$f3 ->run();