<?php


use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
  $routes->setExtensions(['json']);
  $routes->resources('articles');
  $routes->connect('/', ['controller' => 'main', 'action' => 'home']);
  $routes->connect('/categories', ['controller' => 'main', 'action' => 'categories']);
  $routes->connect('/articles', ['controller' => 'Articles', 'action' => 'index']);
  $routes->connect('/categories/*', ['controller' => 'Categories', 'action' => 'view']);
  $routes->connect('/categories/add', ['controller' => 'Categories', 'action' => 'add']);
  $routes->fallbacks('DashedRoute');
});


Plugin::routes();
