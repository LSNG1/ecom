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
    #[Route('/user', name: 'tamere')]
    public function new(Request $request, EntityManagerInterface $entityManager)
    {
        // creates a task object and initializes some data for this example
        $task = new User();

        $form = $this->createFormBuilder($task)
            ->add('Email', TextType::class)
            ->add('password', textType::class)
            ->add('save', SubmitType::class, ['label' => 'Create User'])
            ->getForm();

        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $task = $form->getData();

                $entityManager->persist($task);
                $entityManager->flush();


                // ... perform some action, such as saving the task to the database
    
            
            }

        return $this->render('user/register.html.twig', [
                'form' => $form,
        ]);
        

    }
}