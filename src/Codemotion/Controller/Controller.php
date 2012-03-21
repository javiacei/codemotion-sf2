<?php

namespace Codemotion\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

abstract class Controller
{
    protected $em;

    protected $templating;

    protected $routing;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function setTemplating($templating)
    {
        $this->templating = $templating;
    }

    public function getTemplating()
    {
        return $this->templating;
    }

    public function setRouting($routing)
    {
        $this->routing = $routing;
    }

    public function getRouting()
    {
        return $this->routing;
    }

    protected function renderView($template, array $vars = array())
    {
        $content = $this->getTemplating()->render('Task/' . $template . '.html.twig', $vars);
        return new Response($content);
    }
}
