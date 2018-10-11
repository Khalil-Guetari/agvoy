<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Circuit;
use App\Entity\ProgrammationCircuit;

class FrontofficeHomeController extends AbstractController
{
    /**
     * @Route("/home", name="frontoffice_home")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $programmations = $em->getRepository(ProgrammationCircuit::class)->findAll();
        
        dump($programmations);
        
        return $this->render('front/home.html.twig', array(
            'programmations' => $programmations,
        ));
    }
    /**
     * Finds and displays a circuit entity.
     *
     * @Route("/circuit/{id}", name="front_circuit_show")
     */
    public function circuitShow($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $programmation = $em->getRepository(ProgrammationCircuit::class)->find($id);
        
        dump($programmation);
        
        return $this->render('front/circuit_show.html.twig', [
            'programmation' => $programmation,
        ]);
    }
}
