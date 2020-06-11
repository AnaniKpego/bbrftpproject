<?php

namespace App\Repository;

use App\Entity\RoomBooking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method RoomBooking|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomBooking|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomBooking[]    findAll()
 * @method RoomBooking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomBookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomBooking::class);
    }

    // /**
    //  * @return RoomBooking[] Returns an array of RoomBooking objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    private function findVisibleRoomBookingQuery():QueryBuilder
    {
        return $this->createQueryBuilder('room_booking')
            ->where('room_booking.id != 0')
            ->orderBy('room_booking.id','ASC');

    }

    public function findLatestRoomBookingQuery():array
    {
        return $this->findVisibleRoomBookingQuery()
            ->getQuery()
            ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?RoomBooking
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
