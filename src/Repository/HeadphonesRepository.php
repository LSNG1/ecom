<?php

namespace App\Repository;

use App\Entity\Headphones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Headphones>
 *
 * @method Headphones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Headphones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Headphones[]    findAll()
 * @method Headphones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeadphonesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Headphones::class);
    }

//    /**
//     * @return Headphones[] Returns an array of Headphones objects
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

//    public function findOneBySomeField($value): ?Headphones
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
