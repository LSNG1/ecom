<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserRegisterController extends AbstractController
{
    #[Route('/test', name: 'create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $product = new User();
        $product->setEmail('leo@leo.com');
        $product->setPassword("password");
        $product->setRoles(["User"]);

        $entityManager->persist($product);

        $entityManager->flush();
        return new Response('Saved new User with id '.$product->getId());
    }
}