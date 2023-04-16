<?php 

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;
use App\Controllers\SiteController;
use App\Controllers\AuthController;
use App\Controllers\ProductController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
	'db' => ['dsn' => $_ENV['DB_DSN'], 
             'user' => $_ENV['DB_USER'],
             'password' => $_ENV['DB_PASSWORD'],] 
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/', [ProductController::class, 'index']);
$app->router->get('/add-product', [ProductController::class, 'addproduct']);
$app->router->post('/add-product', [ProductController::class, 'addproduct']);
$app->router->delete('/products/{id}', [ProductController::class, 'delete']);
$app->router->post('/delete-multiple', [ProductController::class, 'massDelete']);





















$app->run();