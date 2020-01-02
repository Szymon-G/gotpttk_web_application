<?php

namespace App\Repository;

use App\Entity\OdcinekTrasy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OdcinekTrasy|null find($id, $lockMode = null, $lockVersion = null)
 * @method OdcinekTrasy|null findOneBy(array $criteria, array $orderBy = null)
 * @method OdcinekTrasy[]    findAll()
 * @method OdcinekTrasy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OdcinekTrasyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OdcinekTrasy::class);
    }

    // /**
    //  * @return OdcinekTrasy[] Returns an array of OdcinekTrasy objects
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
    public function findOneBySomeField($value): ?OdcinekTrasy
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
