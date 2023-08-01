<?php

namespace App\Repository;

use App\Entity\Gpus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gpus>
 *
 * @method Gpus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gpus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gpus[]    findAll()
 * @method Gpus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GpusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gpus::class);
    }

//    /**
//     * @return Gpus[] Returns an array of Gpus objects
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

//    public function findOneBySomeField($value): ?Gpus
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
