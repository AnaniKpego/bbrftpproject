<?php

namespace App\Repository;

use App\Entity\TypeOfTariff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeOfTariff|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeOfTariff|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeOfTariff[]    findAll()
 * @method TypeOfTariff[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeOfTariffRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeOfTariff::class);
    }

    // /**
    //  * @return TypeOfTariff[] Returns an array of TypeOfTariff objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeOfTariff
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
