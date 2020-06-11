<?php

namespace App\Repository;

use App\Entity\ServiceBooking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceBooking|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceBooking|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceBooking[]    findAll()
 * @method ServiceBooking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceBookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceBooking::class);
    }

    // /**
    //  * @return ServiceBooking[] Returns an array of ServiceBooking objects
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
    public function findOneBySomeField($value): ?ServiceBooking
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
