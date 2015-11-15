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

use AppBundle\Entity\User;
use AppBundle\Entity\Status;
use AppBundle\Form\EditUserType;

/**
 * @Route("database-install", name="app")
 */
class MakeUsersController extends Controller
{
    /**
    * @Route("/all", name="all")
    */
    public function indexAction(Request $request)
    {
        $this->installUsers();
        $this->installStatuses();
    }

    public function installUsers(){
        $maleNames = array("Maaiz Rahim","Aayid Akram","Salaah Fadel","Raadi Zaman","Yahya Morad","Sirajuddeen Sultan","Saleem Yusuf","Salaah Hoque","Maaiz Jafari","Mushtaaq Sultan","Anwar Shahidi","Awni Ameen","Jawaad Barakat","Mamoon Bari","Hibbaan Baten","Abdul Baasid Ali","Abdul Ghafoor Kazemi","Bishr Shehata","Mujahid Rahaim","Badraan Abdullah","Anwar Shahidi","Awni Ameen","Jawaad Barakat","Mamoon Bari","Hibbaan Baten","Abdul Baasid Ali","Abdul Ghafoor Kazemi","Bishr Shehata","Mujahid Rahaim","Badraan Abdullah","Shuraih Daoud","Aiman Sabet","Sad Kamara","Munsif Hamidi","Usaama Hamed","Abdur Raqeeb Can","Muaaid Haider","Arkaan Afzal","Ashqar Hashem","Ammaar Rasul");
        $femaleNames = array("Nahla Fahmy","Umaima Rayes","Zuhra Jabbour","Laaiqa Naderi","Sitaara Hashmi","Awda Ozer","Sulama Afzal","Sanad Mahmood","Maimoona Amara","Nuha Neman","Mahdeeya Khan","Tareefa Salman","Rumaana Hadi","Qaaida Tariq","Wasmaaa Dada","Kinaana Barakat","Hadiyya Mahdi","Majeeda Mohammed","Hameeda Younan","Kawkab Vaziri","Labeeba Hamad","Tahaani Farhat","Zumruda Hussain","Nadheera Koroma","Suhaa Naim","Reema Shah","Saajida Samaan","Ameera Jamail","Almaasa Adel","Shamaail Fahs","Qamraaa Sadri","Nuzha Ghazal","Tamanna Azimi","Fareeda Kanan","Hamaama Gaber","Majeeda Hamidi","Nabeeha Suleiman","Manaara Khalil","Saaliha Abraham","Faraah Hammad");

        for ($i=0; $i<10; $i++){
            $user = new User();
            if ($i%2==0){
                $male = "male";
                $name = $maleNames[rand(0,6)];
                $img = $this->getImage("men");
            }else{
                $male = "female";
                $names = $femaleNames[rand(0,6)];
                $img = $this->getImage("women");
            }
            $username = str_replace(' ', '', $name);
            $mail = $username . "@gmail.com";
            $num = "658806711";

            $user->setUsername($username . rand(1,50000));
            $user->setFullName($name);
            $user->setEmail($mail);
            $user->setNumber($num);
            $days = rand(10,40)*365+rand(1,400);
            $str = $days . " days ago";
            $user->setDob(new \DateTime($str));
            $user->setPassword("pass");
            $user->setGender($male);
            $user->setPicture($img);

            $em = $this->getDoctrine()->getManager();

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);

            $em->persist($user);
            $em->flush();
        }
    }

     public function installStatuses(){
        $repo = $this->getDoctrine()->getManager()->getRepository('AppBundle:User');
        $allUsers = $repo->findAll();

        $lat = array("43.320855", "44.797788", "45.556100", "47.480260", "45.805764", "47.042677", "48.194631", "47.820421", "48.137636");
        $lng = array("21.893038", "20.446844", "18.680669", "19.022483", "16.000534", "15.433433", "16.388959", "13.071807", "11.556948");        
        $name = array("Nis, Serbia", "Belgrade, Serbia", "Osijek, Croatia", "Budapest, Hungary", "Zagreb, Croatia", "Graz, Austria", "Vienna, Austria", "Salzburg, Austria", "Munich, Germany");

        $notes = array("");

        foreach ($allUsers as $user){
            $max = 0;
            $finish = rand(5,8);
            while ($max<$finish){
                $status = new Status();
                $status->setLtd($lat[$max]);
                $status->setLng($lng[$max]);
                $status->setLocation($name[$max]);
                $status->setNote($notes[rand(0,count($notes)-1)]);
                $status->setUser($user);
                $status->setDate(new \DateTime());
                $max = rand($max+1, $finish);

                $em = $this->getDoctrine()->getManager();
                $em->persist($status);
                $em->flush();
            }
        }
     }

    public function getImage($male)
   {
       $url = "http://api.randomuser.me/portraits/". $male ."/".rand(1, 95).".jpg";
       $ch = curl_init ($url);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       $raw=curl_exec($ch);
       curl_close ($ch);
       // echo '<img src="data:jpg;base64,'.base64_encode($raw).'">';
       // return new JsonResponse($response);
       return 'data:jpg;base64,'.base64_encode($raw);
   }

}