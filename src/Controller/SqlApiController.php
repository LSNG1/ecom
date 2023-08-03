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

#[Route('/api', name: 'api_')]
class SqlApiController extends AbstractController
{


    // #1 = route get -> return toute la data du / (exemple : /gpu = renvoie le json de tout les gpu)

    //#2 = route qui return dans la section uniquement le produit qui a l'id demender (ex : /gpu/1 = Json du gpu avec l'id 1 uniquement)

    //#3 = route pour ajouté dans la db avec un form.

    #[Route('/gpu', name: 'project_index', methods:['get'] )]                //#1
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Gpu::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/gpu/{id}', name: 'gpuID_index', methods:['get'])]                 //#2
    public function gpuID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Gpu::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/gpu', name: 'ADDgpu', methods:['post'] )]                            #3 
    public function create(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
                                                                //dans le form, il faut mettre en tant que name (pour le post) les meme données qu'en dessous : 
        $product = new Gpu();
        $product->setName($request->request->get('name'));          //name
        $product->setPrice($request->request->get('price'));        //price
        $product->setChipset($request->request->get('chipset'));    //chipset
        $product->setMemory($request->request->get('memory'));      //memory
        $product->setCoreClock($request->request->get('core_clock')); //core clock
        $product->setBoost_Clock($request->request->get('boost_clock')); //boost_clock
        $product->setColor($request->request->get('color'));        //color
        $product->setLength($request->request->get('length'));      //length    
                                                                    
                                                                    //toujours faire atention et bien regarder a mettre les memes !

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
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
           
        return $this->json($data);
    }

    #[Route('/gpu/{id}', name: '/gpu_id_delete', methods:['delete'] )]
    public function deletegpu(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Gpu::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }




    #[Route('/cpu', name: 'cpu_index', methods:['get'] )]                   //#1
    public function cpu(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Cpu::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/cpu/{id}', name: 'cpuID_index', methods:['get'])]                 //#2
    public function cpuID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Cpu::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/cpu/{id}', name: '/cpu_id_delete', methods:['delete'] )]
    public function deletecpu(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Cpu::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/cpu', name: 'ADDcpu', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createCPU(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Cpu();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setCoreCount($request->request->get('core_count'));       // <--
        $product->setCoreClock($request->request->get('core_clock'));       // <--
        $product->setBoostClock($request->request->get('boost_clock'));     // <--
        $product->setTdp($request->request->get('tdp'));                    // <--
        $product->setGraphics($request->request->get('graphics'));          // <--
        $product->setSmt($request->request->get('smt'));                    // <--

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
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
           
        return $this->json($data);
    }

    #[Route('/box', name: 'box_index', methods:['get'] )]                   #1
    public function box(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Box::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/box/{id}', name: 'boxID_index', methods:['get'])]                 #2
    public function boxID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Box::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/box/{id}', name: '/box_id_delete', methods:['delete'] )]
    public function deletebox(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Box::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/box', name: 'ADDbox', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createbox(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Box();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setType($request->request->get('type'));       // <--
        $product->setColor($request->request->get('color'));       // <--
        $product->setPsu($request->request->get('psu'));     // <--
        $product->setSidePanel($request->request->get('sidepanel'));                    // <--
        $product->setExternal525Bays($request->request->get('external_525_bays'));          // <--
        $product->setInternal35Bays($request->request->get('internal_35_bays'));                    // <--

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
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
           
        return $this->json($data);
    }

    #[Route('/mouse', name: 'mouse_index', methods:['get'] )]                   #1
    public function mouse(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Mouse::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/mouse/{id}', name: 'mouseID_index', methods:['get'])]                 #2
    public function mouseID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Mouse::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/mouse/{id}', name: '/mouse_id_delete', methods:['delete'] )]
    public function deletemouse(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Mouse::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/mouse', name: 'ADDmouse', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createmouse(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Mouse();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setTrackingMethod($request->request->get('tracking_method'));       // <--
        $product->setConnectionType($request->request->get('connection_type'));       // <--
        $product->setMaxDpi($request->request->get('max_dpi'));     // <--
        $product->setHandOrientation($request->request->get('hand_orientation'));                    // <--
        $product->setColor($request->request->get('color'));          // <--

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'tracking_method' => $product->getTrackingMethod(),
            'connection_type' => $product->getConnectionType(),
            'max_dpi' => $product->getMaxDpi(),
            'hand_orientation' => $product->getHandOrientation(),
            'color' => $product->getcolor(),

        ];
           
        return $this->json($data);
    }

    #[Route('/headphones', name: 'headphones_index', methods:['get'] )]                     #1
    public function headphones(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Headphones::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/headphones/{id}', name: 'headphonesID_index', methods:['get'])]                   #2
    public function headphonesID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Headphones::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/headphones/{id}', name: '/headphones_id_delete', methods:['delete'] )]
    public function deleteheadphones(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Headphones::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/headphones', name: 'ADDheadphones', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createheadphones(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Headphones();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setType($request->request->get('type'));       // <--
        $product->setFrequencyResponse($request->request->get('frequency_response'));       // <--
        $product->setMicrophone($request->request->get('microphone'));     // <--
        $product->setWireless($request->request->get('wireless'));
        $product->setEnclosureType($request->request->get('enclosure_type'));          // <--        // <--
        $product->setColor($request->request->get('color'));          // <--

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'frequency_response' => $product->getFrequencyResponse(),
            'microphone' => $product->isMicrophone(),
            'wireless' => $product->isWireless(),
            'enclosure_type' => $product->getEnclosureType(),
            'color' => $product->getcolor(),

        ];
           
        return $this->json($data);
    }

    #[Route('/motherboard', name: 'motherboard_index', methods:['get'] )]                   #1
    public function motherboard(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Motherboard::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/motherboard/{id}', name: 'motherboardID_index', methods:['get'])]                 #2
    public function motherboardID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Motherboard::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/motherboard/{id}', name: '/motherboard_id_delete', methods:['delete'] )]
    public function deletemotherboard(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Motherboard::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/motherboard', name: 'ADDmotherboard', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createmotherboard(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Motherboard();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setSocket($request->request->get('socket'));       // <--
        $product->setFormFactor($request->request->get('form_factor'));       // <--
        $product->setMaxMemory($request->request->get('max_memory'));     // <--
        $product->setMemorySlots($request->request->get('memory_slots'));
        $product->setColor($request->request->get('color'));          // <--

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'socket' => $product->getSocket(),
            'form_factor' => $product->getFormFactor(),
            'max_memory' => $product->getMaxMemory(),
            'memory_slots' => $product->getMemorySlots(),
            'color' => $product->getcolor(),

        ];
           
        return $this->json($data);
    }

    #[Route('/power_supply', name: 'power_supply_index', methods:['get'] )]                     #1
    public function power_supply(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(PowerSupply::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/power_supply/{id}', name: 'power_supplyID_index', methods:['get'])]           #2
    public function power_supplyID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(PowerSupply::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/power_supply/{id}', name: '/power_supply_id_delete', methods:['delete'] )]
    public function deletepower_supply(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(PowerSupply::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/power_supply', name: 'ADDpower_supply', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createpowersupply(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new PowerSupply();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setType($request->request->get('type'));       // <--
        $product->setEfficency($request->request->get('efficiency'));       // <--
        $product->setWattage($request->request->get('wattage'));     // <--
        $product->setModular($request->request->get('modular'));
        $product->setColor($request->request->get('color'));          // <--

        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'type' => $product->getType(),
            'efficiency' => $product->getEfficiency(),
            'wattage' => $product->getWattage(),
            'modular' => $product->getModular(),
            'color' => $product->getcolor(),

        ];
           
        return $this->json($data);
    }


    #[Route('/memory', name: 'memory_index', methods:['get'] )]                 #1
    public function memory(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(Memory::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/memory/{id}', name: 'memoryID_index', methods:['get'])]                   #2
    public function memoryID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Memory::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/memory/{id}', name: '/memory_id_delete', methods:['delete'] )]
    public function deletememory(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(Memory::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/memory', name: 'ADDmemory', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function creatememory(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Memory();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setSpeed($request->request->get('speed'));       // <--
        $product->setModules($request->request->get('modules'));       // <--
        $product->setPricePerBg($request->request->get('price_per_gb'));     // <--
        $product->setFirstWordLatency($request->request->get('first_word_latency'));
        $product->setCasLatency($request->request->get('cas_latency'));          // <--
        $product->setColor($request->request->get('color'));          // <--
        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
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
           
        return $this->json($data);
    }

    #[Route('/cpu_cooler', name: 'memorycpu_cooler', methods:['get'] )]             #1
    public function cpu_cooler(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(CpuCooler::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/cpu_cooler/{id}', name: 'cpu_coolerID_index', methods:['get'])]           #2
    public function cpu_coolerID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(CpuCooler::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
            $data[] = [
                'id' => $product->getId(),
               'name' => $product->getName(),
               'price' => $product->getPrice(),
               'rpm' => $product->getRpm(),
               'noise_level' => $product->getNoiseLevel(),
               'color' => $product->getcolor(),
               'size' => $product->getSize(),

            ];
        // }

        return $this->json($data);
    }

    #[Route('/cpu_cooler/{id}', name: '/memory_id_cpu_cooler', methods:['delete'] )]
    public function deletecpu_cooler(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(CpuCooler::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/cpucooler', name: 'ADDcpucooler', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createcpucooler(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new Cpucooler();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setRpm($request->request->get('rpm'));       // <--
        $product->setNoiseLevel($request->request->get('noise_level'));       // <--
        $product->setSize($request->request->get('size'));     // <--
        $product->setColor($request->request->get('color'));          // <--
        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'rpm' => $product->getRpm(),
            'noise_level' => $product->getNoiseLevel(),
            'color' => $product->getcolor(),
            'size' => $product->getSize(),
        ];
           
        return $this->json($data);
    }

    #[Route('/hard_drive', name: 'hard_drive', methods:['get'] )]               #1
    public function hard_drive(ManagerRegistry $doctrine): JsonResponse
    {
        $product = $doctrine
            ->getRepository(HardDrive::class)
            ->findAll();
   
        $data = [];
   
        foreach ($product as $product) {
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

    #[Route('/hard_drive/{id}', name: 'hard_driveID_index', methods:['get'])]               #2
    public function hard_driveID(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(HardDrive::class)->find($id);
   
        if (!$product) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
       
        // $data = [];

        // foreach ($product as $product) {
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
        // }

        return $this->json($data);
    }

    #[Route('/hard_drive', name: 'ADDhard_drive', methods:['post'] )]                 //#3            !!! voir le premier #3, attention au name mis dans le form !
    public function createhard_drive(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();
   
        $product = new HardDrive();
        $product->setName($request->request->get('name'));                  // <--
        $product->setPrice($request->request->get('price'));                // <--
        $product->setCapacity($request->request->get('capacity'));       // <--
        $product->setPricePerGb($request->request->get('price_per_gb'));       // <--
        $product->setType($request->request->get('type'));     // <--
        $product->setCache($request->request->get('cache'));          // <--
        $product->setFormFactor($request->request->get('form_factor'));          // <--
        $product->setInterface($request->request->get('interface'));          // <--
        
        $entityManager->persist($product);
        $entityManager->flush();
   
        $data =  [
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
           
        return $this->json($data);
    }

    #[Route('/hard_drive/{id}', name: 'hard_driveID_delete', methods:['delete'] )]
    public function deletehard_drive(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $project = $entityManager->getRepository(HardDrive::class)->find($id);
   
        if (!$project) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        $entityManager->remove($project);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

}
