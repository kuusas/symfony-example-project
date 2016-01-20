<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="task")
     */
    public function indexAction()
    {
        return $this->render('TaskBundle:Default:index.html.twig');
    }
}
