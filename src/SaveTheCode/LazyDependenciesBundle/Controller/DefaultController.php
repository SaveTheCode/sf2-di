<?php

namespace SaveTheCode\LazyDependenciesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package SaveTheCode\LazyDependenciesBundle\Controller
 *
 * @Route("/lazy-dependencies")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/lazy/do-something")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doSomethingLazyAction()
    {
        $this->container->get('main_with_lazy_dependency')->doSomething();

        return $this->renderDefaultView();
    }

    /**
     * @Route("/lazy/do-something-with-dependency")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doSomethingWithDependencyLazyAction()
    {
        $this->container->get('main_with_lazy_dependency')->doSomethingWithDependency();

        return $this->renderDefaultView();
    }

    /**
     * @Route("/not-lazy/do-something")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doSomethingAction()
    {
        $this->container->get('main')->doSomething();

        return $this->renderDefaultView();
    }

    /**
     * @Route("/not-lazy/do-something-with-dependency")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doSomethingWithDependencyAction()
    {
        $this->container->get('main')->doSomethingWithDependency();

        return $this->renderDefaultView();
    }

    /**
     * Render default view
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function renderDefaultView()
    {
        return $this->render('SaveTheCodeLazyDependenciesBundle:Default:index.html.twig');
    }
}
