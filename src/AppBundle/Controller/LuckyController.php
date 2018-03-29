<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{

    /**
     * @Route("/lucky/number")
     */



    public function numberAction()
    {
            $superzahl = true;
            return $this->render('lucky/number.html.twig', array(
                'response' => '',
                'anzahl'   => 6,
                'superzahl' => $superzahl,
            ));
        }


}
