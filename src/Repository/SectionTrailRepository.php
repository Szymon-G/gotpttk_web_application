<?php

namespace App\Repository;

use App\Entity\SectionTrail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SectionTrail|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionTrail|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionTrail[]    findAll()
 * @method SectionTrail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionTrailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionTrail::class);
    }

    // /**
    //  * @return SectionTrail[] Returns an array of SectionTrail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SectionTrail
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
