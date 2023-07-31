<?php

namespace App\Repository;

use App\Entity\CpuCooler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CpuCooler>
 *
 * @method CpuCooler|null find($id, $lockMode = null, $lockVersion = null)
 * @method CpuCooler|null findOneBy(array $criteria, array $orderBy = null)
 * @method CpuCooler[]    findAll()
 * @method CpuCooler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpuCoolerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CpuCooler::class);
    }

//    /**
//     * @return CpuCooler[] Returns an array of CpuCooler objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CpuCooler
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
