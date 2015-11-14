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
        $em = $this->getDoctrine()->getManager();
        $em->persist($status);
        $em->flush();
        $em->refresh($status);
        return new JsonResponse('{id: '.$status->getId().'}');
    }

}
