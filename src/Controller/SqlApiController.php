<?php

namespace App\Controller;

use App\Entity\Gpu;
use App\Entity\Cpu;
use App\Entity\Box;
use App\Entity\Mouse;
use App\Entity\Headphones;
use App\Entity\Motherboard;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Project;

#[Route('/api', name: 'api_')]
class SqlApiController extends AbstractController
{
    #[Route('/gpu', name: 'project_index', methods:['get'] )]
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


    #[Route('/cpu', name: 'cpu_index', methods:['get'] )]
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

    #[Route('/box', name: 'box_index', methods:['get'] )]
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

    #[Route('/mouse', name: 'mouse_index', methods:['get'] )]
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

    #[Route('/headphones', name: 'headphones_index', methods:['get'] )]
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

    #[Route('/motherboard', name: 'motherboard_index', methods:['get'] )]
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
}
