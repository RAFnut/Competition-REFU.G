<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * @Route("/app", name="app")
 */
class UserController extends Controller
{
    /**
     * @Route("/", name="app_home")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:user:index.html.twig', array(

        ));
    }
}
