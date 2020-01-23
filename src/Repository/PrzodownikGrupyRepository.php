<?php

namespace App\Repository;

use App\Entity\PrzodownikGrupy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PrzodownikGrupy|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrzodownikGrupy|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrzodownikGrupy[]    findAll()
 * @method PrzodownikGrupy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrzodownikGrupyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrzodownikGrupy::class);
    }

    // /**
    //  * @return PrzodownikGrupy[] Returns an array of PrzodownikGrupy objects
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
    public function findOneBySomeField($value): ?PrzodownikGrupy
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
