<?php

namespace App\Repository;

use App\Entity\Blog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Blog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blog[]    findAll()
 * @method Blog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blog::class);
    }

    // /**
    //  * @return Blog[] Returns an array of Blog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    /**
     * find all order isActivated=true and by created At
     * @return blog[]
     */
    public function findAllByDate()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.isActivated = 1')
            ->addOrderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->execute()
            //->setMaxResults(10)
        ;
    }

    /**
     * find 4 article if isActivated=true and order by created At
     *
     * @return blog[]
     */
    public function findFourByDate()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.isActivated = 1')
            ->addOrderBy('d.createdAt', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->execute()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Blog
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
