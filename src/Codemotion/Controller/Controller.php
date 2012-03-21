<?php

namespace Codemotion\Controller;

use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected $container;

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function get($service)
    {
        return $this->container->get($service);
    }

    protected function renderView($template, array $vars = array())
    {
        $content = $this->get('twig')->render('Task/' . $template . '.html.twig', $vars);
        return new Response($content);
    }
}
