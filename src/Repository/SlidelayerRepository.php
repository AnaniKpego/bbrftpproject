<?php

namespace App\Repository;

use App\Entity\Slidelayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Slidelayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Slidelayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Slidelayer[]    findAll()
 * @method Slidelayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SlidelayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slidelayer::class);
    }

    // /**
    //  * @return Slidelayer[] Returns an array of Slidelayer objects
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
    public function findOneBySomeField($value): ?Slidelayer
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
