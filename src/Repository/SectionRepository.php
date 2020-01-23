<?php

namespace App\Repository;

use App\Entity\Section;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Section|null find($id, $lockMode = null, $lockVersion = null)
 * @method Section|null findOneBy(array $criteria, array $orderBy = null)
 * @method Section[]    findAll()
 * @method Section[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Section::class);
    }

    /**
     * @param Int $idG
     * @return array
     */
    public function getDistinctEndPointsFromGroup(Int $idG): array
    {
        $qb = $this->createQueryBuilder('s')
            ->where('s.idG = :idG')
            ->andWhere('s.isOutOfBase is NULL')
            ->setParameter('idG', $idG)
            ->groupBy('s.endPoint');

        $query = $qb->getQuery();

        return $query->execute();
    }

    /**
     * @param String $sectionName
     * @param Int $sectionGroup
     * @return array
     */
    public function findByNameAndGroup(String $sectionName, Int $sectionGroup): array
    {
        if($sectionGroup){
            $qb = $this->createQueryBuilder('section')
                ->join('section.startPoint', 'startPoint')
                ->join('section.endPoint', 'endPoint')
                ->where("startPoint.name LIKE :name")
                ->orWhere("endPoint.name LIKE :name")
                ->andWhere('section.isOutOfBase is NULL')
                ->andWhere('section.idG = :idG')
                ->setParameter('name', '%' . $sectionName . '%')
                ->setParameter('idG', $sectionGroup);
        }
        else{
            $qb = $this->createQueryBuilder('section')
                ->join('section.startPoint', 'startPoint')
                ->join('section.endPoint', 'endPoint')
                ->where("startPoint.name LIKE :name")
                ->orWhere("endPoint.name LIKE :name")
                ->andWhere('section.isOutOfBase is NULL')
                ->setParameter('name', '%' . $sectionName . '%');
        }
        $query = $qb->getQuery();
        return $query->execute();
    }
}
