<?php

require_once __DIR__ . '/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

$container = new ContainerBuilder();
$loader = new XmlFileLoader(
    $container,
    new FileLocator(__DIR__ . '/../app/config/container')
);

/* Configuración Twig */
$loader->load('twig.xml');
$container->setParameter('twig.cache_dir', __DIR__ . '/../app/cache/twig');
$container->setParameter('twig.views_dir', __DIR__ . '/../src/Codemotion/View');

/* Configuración Request */
$loader->load('request.xml');

/* Configuración Routing */
$loader->load('routing.xml');
$container->setParameter('routing.routes_dir', __DIR__ . '/config');
$container->setParameter('routing.yaml_routes_file', 'routing.yml');
$container->setParameter('routing.cache_dir', __DIR__ . '/cache/routing');
