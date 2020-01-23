<?php

namespace App\Repository;

use App\Entity\KsiazeczkaWeryfikowana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method KsiazeczkaWeryfikowana|null find($id, $lockMode = null, $lockVersion = null)
 * @method KsiazeczkaWeryfikowana|null findOneBy(array $criteria, array $orderBy = null)
 * @method KsiazeczkaWeryfikowana[]    findAll()
 * @method KsiazeczkaWeryfikowana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KsiazeczkaWeryfikowanaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KsiazeczkaWeryfikowana::class);
    }

    // /**
    //  * @return KsiazeczkaWeryfikowana[] Returns an array of KsiazeczkaWeryfikowana objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KsiazeczkaWeryfikowana
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
