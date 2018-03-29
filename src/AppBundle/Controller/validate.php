<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class validate extends Controller
{
    /**
     * @Route("/src/AppBundle/Controller/validate.php")
     */
    public function numbers_validate()
    {
        $treffer = 0;
        $anzahl = $_POST["anzahl"];
        $superzahl['wert'] = $_POST["superzahl"];
        $superzahl['eingabe'] = $_POST["superzahl_value"];

        for ($i = 1; $i <= $anzahl; $i++) {
            $numbers[$i]['eingabe'] = $_POST["Zahl" . $i];
            $numbers[$i]['richtig'] = mt_rand(1, 49);

            if ($numbers[$i]['eingabe'] == $numbers[$i]['richtig']) {
                $treffer++;
            }
        }

        if ($superzahl['wert'] == true) {
            $superzahl['richtig'] = mt_rand(1, 49);

            if ($superzahl['eingabe'] == $superzahl['richtig']) {
                $plus_superzahl = true;

            }
        }

        if ($treffer != 0) {
            $percent = $anzahl / 6;

        }
        if ($treffer == $anzahl) {
            $percent = 100;
        } else {
            $percent = 0;
        }

        switch ($percent) {
            case($percent <= 20):
                $response = "Du hast leider nichts gewonnen";
                break;
            case($percent <= 50):
                $response = "Du hast 5€ gewonnen";
                break;
            case($percent <= 70):
                $response = "Du hast 10€ gewonnen";
                break;
            case($percent == 100):
                $response = "Du hast alle Zahlen, bis auf die Superzahl richtig und hast 20€ gewonnen";
                break;
            case($percent == 100 && $plus_superzahl == true):
                $response = "Du hast alle Zahlen und hast 200€ gewonnen";
                break;
        }
             $percent = $percent . "%";
                return $this->render('lucky/endseite.html.twig', array(
                    'response' => $response,
                    'zahlen' => $numbers,
                    'anzahl' => $anzahl,
                    'percent' => $percent,
                    'superzahl' => $superzahl,
                ));

    }
}
