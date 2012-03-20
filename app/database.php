<?php

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;

$cache = new \Doctrine\Common\Cache\ArrayCache;

$config = new Configuration;
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver(__DIR__ . '/../src/Codemotion/Model');
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/cache/doctrine');
$config->setProxyNamespace('Codemotion\Proxies');

$config->setAutoGenerateProxyClasses(true);
