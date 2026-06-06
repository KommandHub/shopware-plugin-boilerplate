<?php

declare(strict_types=1);

use Kommandhub\Shopware\Boilerplate\Tests\TestBootstrapper;

$loader = (new TestBootstrapper())
    ->addCallingPlugin()
    ->addActivePlugins(
        'KommandhubFoundationSW',
        'ShopwarePluginBoilerplate'
    )
    ->bootstrap()
    ->getClassLoader();

$loader->addPsr4('Shopware\\Boilerplate\\Tests\\', __DIR__);
