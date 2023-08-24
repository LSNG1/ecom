<?php

namespace App\Repository;

use App\Entity\UserCart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserCart>
 *
 * @method UserCart|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserCart|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserCart[]    findAll()
 * @method UserCart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserCartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserCart::class);
    }

//    /**
//     * @return UserCart[] Returns an array of UserCart objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserCart
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
