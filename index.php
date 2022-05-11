<?php
//
//use Illuminate\Http\Request;
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//use Illuminate\Contracts\Http\Kernel;
//use Illuminate\Database\Capsule\Manager as Capsule;
//
//define('LARAVEL_START', microtime(true));
//
//require __DIR__.'/vendor/autoload.php';
//
//$app = require_once __DIR__.'/src/bootstrap/app.php';
//
//
//$capsule = new Capsule;
//
//$capsule->addConnection([
//    'driver' => 'mysql',
//    'host' => '127.0.0.1',
//    'database' => 'helix',
//    'username' => 'yousef',
//    'password' => 'yousef',
//    'charset' => 'utf8',
//    'collation' => 'utf8_unicode_ci',
//    'prefix' => '',
//]);
//
//$capsule->setEventDispatcher(new Dispatcher(new Container));
//
//// Make this Capsule instance available globally via static methods... (optional)
//$capsule->setAsGlobal();
//
//// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
//$capsule->bootEloquent();
//
//$kernel = $app->make(Kernel::class);
//
//$response = $kernel->handle(
//    $request = Request::capture()
//)->send();


use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__ . '/src/storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__ . '/src/bootstrap/app.php';
try {

    $kernel = $app->make(Kernel::class);
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();

    $kernel->terminate($request, $response);
}catch (Exception $exception) {
//    dd($exception);
}
