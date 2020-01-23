<?php

namespace App\Repository;

use App\Entity\PrzodownikGOT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PrzodownikGOT|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrzodownikGOT|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrzodownikGOT[]    findAll()
 * @method PrzodownikGOT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrzodownikGOTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrzodownikGOT::class);
    }

    // /**
    //  * @return PrzodownikGOT[] Returns an array of PrzodownikGOT objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrzodownikGOT
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
