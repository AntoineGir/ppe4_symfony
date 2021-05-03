<?php

namespace App\Repository;

use App\Entity\PhotoAvis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PhotoAvis|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoAvis|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoAvis[]    findAll()
 * @method PhotoAvis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoAvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoAvis::class);
    }

    // /**
    //  * @return PhotoAvis[] Returns an array of PhotoAvis objects
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
    public function findOneBySomeField($value): ?PhotoAvis
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
