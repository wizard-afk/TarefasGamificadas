<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rotas de Login
$routes->get('login', 'Login::index');
$routes->post('login/autenticar', 'Login::autenticar');
$routes->get('login/logout', 'Login::logout'); 

// Rotas de Tarefas
$routes->get('tarefas/listar', 'Tarefas::listar');
$routes->post('tarefas/cadastrar', 'Tarefas::cadastrar');
$routes->get('tarefas/excluir/(:num)', 'Tarefas::excluir/$1');
$routes->post('tarefas/editar', 'Tarefas::editar');
$routes->get('tarefas/concluir/(:num)', 'Tarefas::concluir/$1');

$routes->get('jardim', 'JardimController::index');
$routes->post('jardim/realizarAcao/(:alpha)', 'JardimController::realizarAcao/$1');


// Habilitar AutoRoute se necessário
$routes->setAutoRoute(true);
 