<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;

use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\ErrorHandler;

class PublicController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:public:index.html.twig', array(

        ));
    }
    /**
     * @Route("/post-login", name="logged_in")
     */
    public function loggedInAction(Request $request)
    {
        return $this->redirect($this->generateUrl("app_home"));
    }
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'AppBundle:public:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createUserForm($user);
        $form->handleRequest($request); 

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            try {
                $em->persist($user);
                $em->flush();
            } catch (\Doctrine\DBAL\DBALException $e) {
                return new JsonResponse("Username vec postoji. Pokusajte ponovo.");
                                
            }
            return $this->redirect($this->generateUrl('app_home'));        
        }

        return $this->render('AppBundle:public:register.html.twig', array(
            'form'   => $form->createView(),
        ));
    }

    private function createUserForm(User $user)
    {
        $form = $this->createForm(new UserType(), $user, array(
            'action' => $this->generateUrl('register'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create new user'));

        return $form;
    }
}
