<?php

namespace App\Repository;

use App\Entity\Mouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mouse>
 *
 * @method Mouse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mouse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mouse[]    findAll()
 * @method Mouse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MouseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mouse::class);
    }

//    /**
//     * @return Mouse[] Returns an array of Mouse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mouse
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
