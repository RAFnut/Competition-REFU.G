<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @Route("/app", name="app")
 */
class UserController extends Controller
{
    private function serialize($object)
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($object, 'json');
        return $jsonContent;
    }

    /**
     * @Route("/", name="app_home")
     */
    public function indexAction(Request $request)
    {

        echo $this->serialize($this->getUser());

        return $this->render('AppBundle:user:index.html.twig', array(
        ));
    }

    /**
     * @Route("/update-status", name="updateStatus")
     */
    public function updateStatusAction(Request $request)
    {
        return $this->render('AppBundle:user:update-status.html.twig', array(
        ));
    }

    /**
     * @Route("/news", name="news")
     */
    public function newsAction(Request $request)
    {
        return $this->render('AppBundle:user:news.html.twig', array(
        ));
    }

    /**
     * @Route("/important-info", name="importantInfo")
     */
    public function importantInfoAction(Request $request)
    {
        return $this->render('AppBundle:user:important-info.html.twig', array(
        ));
    }
    
    /**
     * @Route("/profile/{id}", requirements={"id" = "\d+"}, name="profile")
     */
    public function profileAction(Request $request, $id = -1)
    {
        return $this->render('AppBundle:user:profile.html.twig', array(
        ));
    }

    /**
     * @Route("/list-people", name="listPeople")
     */
    public function listPeopleAction(Request $request)
    {
        return $this->render('AppBundle:user:list-people.html.twig', array(
        ));
    }
}
