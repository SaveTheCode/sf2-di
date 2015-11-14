<?php

namespace SaveTheCode\LazyDependenciesBundle\Service;

/**
 * Class MainService
 * @package SaveTheCode\LazyDependenciesBundle\Service
 */
class MainService
{
    private $dependency;

    public function __construct(DependencyService $dependency)
    {
        $this->dependency = $dependency;
    }

    public function doSomething()
    {
    }

    public function doSomethingWithDependency()
    {
        $this->dependency->doWhatever();
    }
}