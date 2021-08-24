<?php

namespace App\Repository;

use App\Entity\ExamFeature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExamFeature|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamFeature|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamFeature[]    findAll()
 * @method ExamFeature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamFeatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamFeature::class);
    }

    // /**
    //  * @return ExamFeature[] Returns an array of ExamFeature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExamFeature
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
