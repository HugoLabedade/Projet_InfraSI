<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Entity\Themes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {

        $Themes = $this->getDoctrine()
            ->getRepository(Themes::class)
            ->findAll();

        
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Themes' => $Themes
        ]);
    }


    /**
     * @Route("/questions/{theme}", name="questions")
     */
    public function Questions(string $theme)
    {

        $Questions = $this->getDoctrine()
            ->getRepository(Questions::class)
            ->findBy(array('theme' => $theme));


        
        return $this->render('home/questions.html.twig', [
            'controller_name' => 'HomeController',
            'Questions' => $Questions
        ]);
    }
}
