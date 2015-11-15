<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @Route("/app/api", name="api")
 */
class ApiController extends Controller
{
    private function serialize($object)
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($object, 'json');
        return $jsonContent;
    }

    private function deserialize($json, $entityName)
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $object = $serializer->deserialize($json, $entityName, 'json');
        return $object;
    }

    /**
     * @Route("/update-status", name="updateStatusApi")
     */
    public function updateStatusApiAction(Request $request)
    {
        $json = $request->request->get('status');
        $status = $this->deserialize(json_encode($json), 'AppBundle\Entity\Status');

        $status->setUser($this->getUser());

        $status->setDate(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($status);
        $em->flush();
        $em->refresh($status);
        return new JsonResponse('{id: '.$status->getId().'}');
    }

    /**
     * @Route("/subscribe", name="subscribe")
     */
    public function subscribeAction(Request $request)
    {
        $id = $request->query->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $otherUser = $repository->findOneById($id);
        
        if (!($otherUser)){
            return new JsonResponse("No user with that id");
        }
        $user = $this->getUser();

        $nest = $otherUser->getPeopleIFollow();

        if ($nest->contains($user)){
            return new JsonResponse("He is already subscribed");
        }

        $em = $this->getDoctrine()->getManager();

        $otherUser->addPeopleIFollow($user);

        $em->persist($otherUser);
        $em->flush();
        return new JsonResponse("Success");
    }

    /**
     * @Route("/unsubscribe", name="unsubscribe")
     */
    public function unsubscribeAction(Request $request)
    {
        $id = $request->query->get('id');
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $otherUser = $repository->findOneById($id);
        
        if (!($otherUser)){
            return new JsonResponse("No user with that id");
        }
        $user = $this->getUser();

        $nest = $otherUser->getPeopleIFollow();
        
        if ($nest->contains($user)){
            $em = $this->getDoctrine()->getManager();

            $otherUser->removePeopleIFollow($user);

            $em->persist($otherUser);
            $em->flush();
            return new JsonResponse("Success");
        }

        return new JsonResponse("He is not subscribed");
    }

}
