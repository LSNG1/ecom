<?php

namespace App\Repository;

use App\Entity\HardDrive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HardDrive>
 *
 * @method HardDrive|null find($id, $lockMode = null, $lockVersion = null)
 * @method HardDrive|null findOneBy(array $criteria, array $orderBy = null)
 * @method HardDrive[]    findAll()
 * @method HardDrive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HardDriveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HardDrive::class);
    }

//    /**
//     * @return HardDrive[] Returns an array of HardDrive objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HardDrive
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
