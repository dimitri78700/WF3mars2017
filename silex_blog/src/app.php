<?php

use Repository\CategoryRepository;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

// Ajout doctrine DBAL 
// on doit ensuite exécuter 
// composer require "doctrine/dbal:~2.2"
// en ligne de commande dans le répertoire de l'application

$app->register(
        new DoctrineServiceProvider(),
        [  
            'db.options' => [
                'driver' => 'pdo_mysql',                
                'host' => 'localhost',
                'dbname' => 'silex_blog',  
                'user' => 'root', 
                'password' => '', 
                'charset' => 'utf8',  
            ]   
        ]
      );

$app['category.repository'] = function () use ($app) {
    return new CategoryRepository($app['db']);
};

    return $app;
