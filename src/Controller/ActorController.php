<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Program;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/actor", name="actor_")
 */

class ActorController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response A response instance
     */

    public function index(): Response
    {
        $actors = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findAll();
        return $this->render('actor/index.html.twig', [
            'actors' => $actors,
        ]);
    }
    /**
     * @Route("/{actor}", name="show")
     */
    public function show(Actor $actor): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll($actor);
        return $this->render('actor/show.html.twig', [
            'programs' => $programs,
            'actor' => $actor,
        ]);
    }
}
