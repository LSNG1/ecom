<?php

namespace App\Controller;

use App\Entity\Gpu;
use App\Entity\Cpu;
use App\Entity\Box;
use App\Entity\Mouse;
use App\Entity\Headphones;
use App\Entity\Motherboard;
use App\Entity\PowerSupply;
use App\Entity\Memory;
use App\Entity\CpuCooler;
use App\Entity\HardDrive;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Project;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

#[Route('/api', name: 'api_')]
class SqlApiController extends AbstractController
{
    #[Route('/gpu', name: 'project_index', methods:['get'])]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Gpu::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'chipset' => $product->getChipset(),
                'memory' => $product->getMemory(),
                'coreClock' => $product->getCoreClock(),
                'boost' => $product->getBoost_Clock(),
                'color' => $product->getColor(),
                'length' => $product->getLength(),


            ];
        }

        return $this->json($data);
    }


    #[Route('/cpu', name: 'cpu_index', methods:['get'])]
    public function cpu(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Cpu::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'core_count' => $product->getCoreCount(),
                'core_clock' => $product->getCoreClock(),
                'boost_clock' => $product->getBoostClock(),
                'tdp' => $product->getTdp(),
                'graphics' => $product->getGraphics(),
                'smt' => $product->isSmt(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/box', name: 'box_index', methods:['get'])]
    public function box(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Box::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'type' => $product->getType(),
                'color' => $product->getColor(),
                'psu' => $product->getPsu(),
                'side_panel' => $product->getSidePanel(),
                'external_525_bays' => $product->getExternal525Bays(),
                'internal_35_bays' => $product->getInternal35Bays(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/mouse', name: 'mouse_index', methods:['get'])]
    public function mouse(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Mouse::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'tracking_method' => $product->getTrackingMethod(),
                'connection_type' => $product->getConnectionType(),
                'max_dpi' => $product->getMaxDpi(),
                'hand_orientation' => $product->getHandOrientation(),
                'color' => $product->getcolor(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/headphones', name: 'headphones_index', methods:['get'])]
    public function headphones(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Headphones::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'frequency_response' => $product->getFrequencyResponse(),
                'microphone' => $product->isMicrophone(),
                'wireless' => $product->isWireless(),
                'enclosure_type' => $product->getEnclosureType(),
                'color' => $product->getcolor(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/motherboard', name: 'motherboard_index', methods:['get'])]
    public function motherboard(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Motherboard::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'socket' => $product->getSocket(),
                'form_factor' => $product->getFormFactor(),
                'max_memory' => $product->getMaxMemory(),
                'memory_slots' => $product->getMemorySlots(),
                'color' => $product->getcolor(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/power_supply', name: 'power_supply_index', methods:['get'])]
    public function power_supply(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(PowerSupply::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'type' => $product->getType(),
                'efficiency' => $product->getEfficiency(),
                'wattage' => $product->getWattage(),
                'modular' => $product->getModular(),
                'color' => $product->getcolor(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/memory', name: 'memory_index', methods:['get'])]
    public function memory(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(Memory::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'speed' => $product->getSpeed(),
                'modules' => $product->getModules(),
                'price_per_gb' => $product->getPricePerGb(),
                'color' => $product->getcolor(),
                'first_word_latency' => $product->getFirstWordLatency(),
                'cas_latency' => $product->getCasLatency(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/cpu_cooler', name: 'memorycpu_cooler', methods:['get'])]
    public function cpu_cooler(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(CpuCooler::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'rpm' => $product->getRpm(),
                'noise_level' => $product->getNoiseLevel(),
                'color' => $product->getcolor(),
                'size' => $product->getSize(),


            ];
        }

        return $this->json($data);
    }

    #[Route('/hard_drive', name: 'hard_drive', methods:['get'])]
    public function hard_drive(ManagerRegistry $doctrine): JsonResponse
    {
        $products = $doctrine
            ->getRepository(HardDrive::class)
            ->findAll();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'capacity' => $product->getCapacity(),
                'price_per_gb' => $product->getPricePerGb(),
                'type' => $product->getType(),
                'cache' => $product->getCache(),
                'form_factor' => $product->getFormFactor(),
                'interface' => $product->getInterface(),


            ];
        }

        return $this->json($data);
    }
    #[Route('/user', name: 'tamere')]
    public function test(Request $request, EntityManagerInterface $entityManager)
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

            return $this->redirectToRoute('task_success');
        }

        return $this->render('user/register.html.twig', [
                'form' => $form,
        ]);
    }

    #[Route('/register', name: 'register', methods: ['get'])]
    public function new(Request $request, EntityManagerInterface $entityManager)
    {
    
        // $data = $request->getContent();
        // $data = json_decode($data, true);
        // dd($data);
        // return $data;

        $task = new User();

        // dd($request);
        // dd($task);

        $form = $this->createFormBuilder($task)
            ->add('Email', TextType::class)
            ->add('password', textType::class)
            ->add('save', SubmitType::class, ['label' => 'Create User'])
            ->getForm();

        dd($form);

        $form->handleRequest($request);

    
    
        // $data = new User();
        // $data = $request->getContent();
        // dd($data);
        // $data = json_decode($data, true);
        // return $data;
    
    
        // dd($*
    }
    
}