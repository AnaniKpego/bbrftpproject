<?php

namespace App\Repository;

use App\Entity\RoomEquipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RoomEquipment|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomEquipment|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomEquipment[]    findAll()
 * @method RoomEquipment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomEquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomEquipment::class);
    }

    // /**
    //  * @return RoomEquipment[] Returns an array of RoomEquipment objects
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

    /*
    public function findOneBySomeField($value): ?RoomEquipment
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
