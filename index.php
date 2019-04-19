<?php

session_start();
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


//define route  order 1

$f3->route('GET /order', function ()
{
    $view=new Template();
    echo $view->render( 'views/form1.html');


});

//define route  order 2

$f3->route('POST /order2', function ()
{
    $_SESSION['animal']=$_POST['animal'];
    $view=new Template();
    echo $view->render( 'views/form2.html');


});

//define route  order 2

$f3->route('POST /results', function ()
{
    $_SESSION['color']=$_POST['color'];
    $view=new Template();
    echo $view->render( 'views/results.html');


});


//Run fat free
$f3 ->run();