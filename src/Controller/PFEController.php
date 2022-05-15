<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\PFEType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PFE;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class PFEController extends AbstractController
{
    #[Route('pfe/add',name: 'Pfe.add')]
    public function addPfe (EntityManagerInterface $manager, Request $request): Response
    {

        $pfe = new PFE();
        $form=$this->createForm(PfeType::class,$pfe);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $manager->persist($pfe);
            $manager->flush();
            return $this->render('pfe/details.html.twig',[
                'pfe' => $pfe
            ]);
        }


        return $this->render('pfe/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('pfe/statis', name : 'statis' )]
    public function stat (ManagerRegistry $doctrine): Response {
        $repo = $doctrine->getRepository(Entreprise::class);
        $entreprises =$repo->findAll();
        return $this->render('pfe/statis.html.twig',[
            'entreprises'=>$entreprises
        ]);

    }
    #[Route('/pfe', name: 'app_pfe')]
    public function index (ManagerRegistry $doctrine): Response {
        $repo = $doctrine->getRepository(PFE::class);
        $pfes =$repo->findAll();
        return $this->render('pfe/index.html.twig',[
            'pfes'=>$pfes
        ]);
    }}
