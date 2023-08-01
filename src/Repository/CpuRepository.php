<?php

namespace App\Repository;

use App\Entity\Cpu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cpu>
 *
 * @method Cpu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cpu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cpu[]    findAll()
 * @method Cpu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cpu::class);
    }

//    /**
//     * @return Cpu[] Returns an array of Cpu objects
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

//    public function findOneBySomeField($value): ?Cpu
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
