<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Demo;
use App\Form\DemoType;
use App\Entity\Message;
use App\Form\FormulaireType;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo")
     */
    public function index(): Response
    {
        return $this->render('demo/index.html.twig', [
            'controller_name' => 'DemoController',
        ]);
    }

    public function accueil(): Response
    {
        return $this->render('demo/accueil.html.twig', [
            'controller_name' => 'DemoController',
        ]);
    }

    public function damier(): Response
    {
        $ligne = 8;
        $colone = 8;
        $html = "<div>";
        for( $i=0 ; $i<$ligne ; $i++ )
        {
            // la ligne est-elle pair ?
            if ( $i % 2 == 0 )
            {
                $html .=  "<div>\n";
                for( $j=0 ; $j < $colone ; $j++ )
                {
                    // la colonne est-elle pair ?
                    if ( $j % 2 == 0 )
                        $class="class='noir'";
                    else
                        $class="class='blanc'";
                    $html .= "<div $class>\n";
                    $html .= "</div>\n";
                }
                $html .= "</div>\n";
            }
            // sinon
            else
            {
                $html .= "<div>\n";
                for( $j=0 ; $j < $colone ; $j++ )
                {
                    if ( $j % 2 == 0 )
                        $class="class='blanc'";
                    else
                        $class="class='noir'";
                    $html .= "<div $class>\n";
                    $html .= "</div>\n";
                }
                $html .= "</div>\n";
            }
        }
        $html .= "</div>";

        return $this->render('demo/damier.html.twig', [
            'damier' => $html,
        ]);
    }

    public function message(): Response
    {
        $message = new Message();

        $form = $this->createForm(FormulaireType::class, $message);

        return $this->render('demo/formulaire.html.twig', [
            'monFormulaire' => $form->createView(),
        ]);
    }
}