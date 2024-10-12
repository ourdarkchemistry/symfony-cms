<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $helloWorld = $this->get('translator')->trans('Hello World!');
        return $this->render('default/index.html.twig', array('helloWorld' => $helloWorld));
    }
}
