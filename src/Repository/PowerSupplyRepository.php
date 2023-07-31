<?php

namespace App\Repository;

use App\Entity\PowerSupply;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PowerSupply>
 *
 * @method PowerSupply|null find($id, $lockMode = null, $lockVersion = null)
 * @method PowerSupply|null findOneBy(array $criteria, array $orderBy = null)
 * @method PowerSupply[]    findAll()
 * @method PowerSupply[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PowerSupplyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PowerSupply::class);
    }

//    /**
//     * @return PowerSupply[] Returns an array of PowerSupply objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PowerSupply
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
