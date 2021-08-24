<?php

namespace App\Repository;

use App\Entity\InfoContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoContact[]    findAll()
 * @method InfoContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoContact::class);
    }

    // /**
    //  * @return InfoContact[] Returns an array of InfoContact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfoContact
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
