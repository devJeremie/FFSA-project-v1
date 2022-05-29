<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/karting', name: 'karting',methods:  ['GET', 'POST'])]
    public function karting(): Response
    {
        return $this->render('navigation/karting.html.twig',[
            'controller_name'=> 'HomeController'
        ]);
    }
    #[Route('/nosClubs', name: 'nosClubs', methods: ['GET', 'POST'])]
    public function nosClubs(): Response
    {
        return $this->render('navigation/nosClubs.html.twig',[
            'controller_name'=> 'HomeController'
        ]);
    }
    #[Route('/galerie', name: 'galerie', methods: ['GET', 'POST'])]
    public function galerie(): Response
    {
        return $this->render('navigation/galerie.html.twig',[
            'controller_name'=> 'HomeController'
        ]);
    }
    #[Route('/course', name: 'course', methods: ['GET', 'POST'])]
    public function course(): Response
    {
        return $this->render('navigation/course.html.twig',[
            'controller_name'=> 'HomeController'
        ]);
    }




}
