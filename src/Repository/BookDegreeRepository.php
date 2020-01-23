<?php

namespace App\Repository;

use App\Entity\BookDegree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BookDegree|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookDegree|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookDegree[]    findAll()
 * @method BookDegree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookDegreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookDegree::class);
    }

    // /**
    //  * @return BookDegree[] Returns an array of BookDegree objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookDegree
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
