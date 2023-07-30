<?php

namespace App\Repository;

use App\Entity\Gpu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gpu>
 *
 * @method Gpu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gpu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gpu[]    findAll()
 * @method Gpu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GpuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gpu::class);
    }

//    /**
//     * @return Gpu[] Returns an array of Gpu objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Gpu
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
