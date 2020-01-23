<?php

namespace App\Repository;

use App\Entity\MountainGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MountainGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method MountainGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method MountainGroup[]    findAll()
 * @method MountainGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MountainGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MountainGroup::class);
    }

    // /**
    //  * @return Odcinki[]
    //  */
    // public function findAllGreaterThanPrice($price): array
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery(
    //         'SELECT p
    //         FROM App\Entity\Product p
    //         WHERE p.price > :price
    //         ORDER BY p.price ASC'
    //     )->setParameter('price', $price);

    //     // returns an array of Product objects
    //     return $query->getResult();
    // }

    // /**
    //  * @return MountainGroup[] Returns an array of MountainGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MountainGroup
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
