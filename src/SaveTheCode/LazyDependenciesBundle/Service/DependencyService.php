<?php

namespace SaveTheCode\LazyDependenciesBundle\Service;

use SaveTheCode\LazyDependenciesBundle\Util\Util;

/**
 * Class DependencyService
 * @package SaveTheCode\LazyDependenciesBundle\Service
 */
class DependencyService
{
    public function __construct()
    {
        Util::consumeResources();
    }

    public function doWhatever()
    {
    }
}