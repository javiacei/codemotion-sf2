<?php

require_once __DIR__.'/../vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Codemotion' => __DIR__ . '/../src',
    'Symfony' => __DIR__ . '/../vendor',
    'Doctrine' => array(
        __DIR__ . '/../vendor/doctrine-common/lib',
        __DIR__ . '/../vendor/doctrine-dbal/lib',
        __DIR__ . '/../vendor/doctrine/lib'
    )
));
$loader->register();
