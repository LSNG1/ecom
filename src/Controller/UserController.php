<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/register', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager)
    {

        // $data = new User();
        // dd($data);
        // $data = $request->getContent();
        // dd($data);
        // $data = json_decode($data, true);
        // return $data;


        // dd($data);




        // creates a task object and initializes some data for this example
        //     $task = new User();

        //     $form = $this->createFormBuilder($task)
        //         ->add('Email', TextType::class)
        //         ->add('password', textType::class)
        //         ->add('save', SubmitType::class, ['label' => 'Create User'])
        //         ->getForm();

        //     $form->handleRequest($request);
        //         if ($form->isSubmitted() &aa();

        // $entityManager->persist($task);
        // $entityManager->flush();


        //             // ... perform some action, such as saving the task to the database


        //         }

        //     return $this->render('user/register.html.twig', [
        //             'form' => $form,
        //     ]);


    }
}
