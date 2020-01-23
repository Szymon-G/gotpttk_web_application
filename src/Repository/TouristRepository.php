<?php

namespace App\Repository;

use App\Entity\Tourist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tourist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tourist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tourist[]    findAll()
 * @method Tourist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TouristRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tourist::class);
    }

    // /**
    //  * @return Tourist[] Returns an array of Tourist objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tourist
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
